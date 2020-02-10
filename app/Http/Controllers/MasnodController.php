<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masnod;
use App\Masnods_help;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MasnodController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:masnod');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $masnod = Masnod::find($id);

        return view('masnod')->with('masnod',$masnod);
    }

    public function dashboard(){
      if(session('masnod')==null)
        return redirect('/');
      $masnod = Masnod::find(session('masnod'));
      $masnods_help = Masnods_help::where('masnod_id',session('masnod'))->get();
      return view('masnod_new')->with(['masnod'=>$masnod,'masnod_request'=>$masnods_help]);
    }

    public function update_masnod(Request $request){
      $request->validate([
        'email' => 'required|email',
        'name' => 'required',
        'social_id' => 'required|numeric',
        'telephone' => 'required|numeric',
      ]);
        $masnod=Masnod::find($request->id);
        $masnod->name = $request->name;
        $masnod->email = $request['email'];
        $masnod->social_id = $request['social_id'];
        $masnod->governorate = $request['governorate'];
        $masnod->address = $request['address'];
        $masnod->telephone = $request['telephone'];
        $masnod->save();
        return redirect('masnod/dashboard');
    }

    public function masnod_social_id(Request $request){
      $this->validate($request,[
        'front' => 'image|nullable',
        'back' => 'image|nullable'
      ]);
      $masnod = Masnod::find(session('masnod'));
      $filenames = [];
      if ($request->hasFile('front')){
        $filenamewithExt = $request->file('front')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
        $extension = $request->file('front')->getClientOriginalExtension();
        $social_id_front_photo = $filename.'_'.time().'.'.$extension;
        $path = $request->file('front')->storeAs('attachments',$social_id_front_photo);
        $masnod->social_id_front_photo = $social_id_front_photo;
      }
      if ($request->hasFile('back')){
        $filenamewithExt = $request->file('back')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
        $extension = $request->file('back')->getClientOriginalExtension();
        $social_id_back_photo = $filename.'_'.time().'.'.$extension;
        $path = $request->file('back')->storeAs('attachments',$social_id_back_photo);
        $masnod->social_id_back_photo = $social_id_back_photo;
      }


      $masnod->save();
      // if ($request->hasFile('files')){
      //   foreach($request->file('files') as $file){
      //       $filenamewithExt = $file->getClientOriginalName();
      //       $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
      //       $extension = $file->getClientOriginalExtension();
      //       $fileNameToStore = $filename.'_'.time().'.'.$extension;
      //       $path = $file->storeAs('attachments',$fileNameToStore);
      //       array_push($filenames,$fileNameToStore);
      //   }
      //   $social_id_front_photo = isset($filenames[0]) ? $filenames[0] : '';
      //   $social_id_back_photo = isset($filenames[1]) ? $filenames[1] : '';
      //   $masnod->social_id_photo($social_id_front_photo,$social_id_back_photo);
      //   $masnod->save();
      // }
      return redirect('masnod/dashboard');
    }

    public function add_masnod_request(Request $request){
      $this->validate($request,[
        'attachment' => 'image|nullable',
        'description' => 'required'
      ]);
      if ($request->hasFile('attachment')){
        $filenamewithExt = $request->file('attachment')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
        $extension = $request->file('attachment')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('attachment')->storeAs('attachments',$fileNameToStore);
      }else{
       $fileNameToStore = ' ';
      }

      $help = new Masnods_help;
      $help->masnod_id =  session('masnod');
      $help->request_description = $request->description;
      $help->category = $request->category;
      $help->attachments = $fileNameToStore;
      $help->masnod_status = $request->status;
      $help->request_status = 'm';
      if($help->save()){
        return redirect('masnod/dashboard');
      }else {
        return 'try again';
      }
    }

    public function edit_masnod_request($id){

      if(session('masnod')==null)
        return redirect('/');
      $request = Masnods_help::find($id);
      return view('edit_masnod_request')->with('request',$request);
    }
    public function update_masnod_request(Request $request){
      $this->validate($request,[
        'attachment' => 'image|nullable',
        'description' => 'required'
      ]);
      $req = Masnods_help::find($request->id);
      if ($request->hasFile('attachment')){
        $filenamewithExt = $request->file('attachment')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
        $extension = $request->file('attachment')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('attachment')->storeAs('attachments',$fileNameToStore);
        $req->attachments = $fileNameToStore;
      }

      $req->request_description = $request->description;
      $req->category = $request->category;
      $req->masnod_status = $request->masnod_status;
      $req->request_date = $request->request_date;
      $req->request_status = 'm';
      $req->save();
      return redirect('masnod/dashboard');
    }

    public function delete_masnod_request($id){
      if(session('masnod')==null)
        return redirect('/');
      $request = Masnods_help::find($id);
      if($request->delete())
        return redirect('masnod/dashboard');
    }
    public function logout(){
      session()->forget('masnod');
      session()->forget('vmasnod');
      session()->forget('sand');
      session()->forget('vsand');
      return redirect('/');
    }
    public function edit_masnod(){
      if(session('masnod')==null)
        return redirect('/');
      $masnod = Masnod::find(session('masnod'));
      return view('edit_masnod')->with('masnod',$masnod);
    }

}
