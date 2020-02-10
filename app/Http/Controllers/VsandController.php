<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masnods_help;
use Illuminate\Support\Facades\Auth;
use App\Masnod_request;
use App\Sand;
use App\Message;
use App\Masnod;
use App\Payment;
class VsandController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function take_request_form($id){
      if(session('vsand')==null)
        return redirect('/');
        $request = Masnods_help::find($id);
        $sand = Sand::find($request->sand_id);
        $masnod = Masnod::find($request->masnod_id);
        $messages = Message::where('hold',$id)->where('type','vsand')->get();
        return view('vsand_take_request')->with(['request'=>$request,'masnod'=>$masnod,'sand'=>$sand,'messages'=>$messages]);
    }


    public function edit_request_form($id,Request $request){
        if(session('vsand')==null)
          return redirect('/');
        $request = Masnods_help::find($id);
        $sand = Sand::find($request->sand_id);
        return view('vsand_edit_request')->with(['request'=>$request,'sand'=>$sand]);
    }


    public function r_message(Request $request){

      $reques = Masnod_request::find($request->id);
      if($request->method == 'e'){
        $reques->escalate = 1;
      }
      $hold = new Message;
      $hold->message =  $request->message;
      $hold->hold =  $request->id;
      $hold->type =  'vsand';
      $hold->name =  Auth::guard('vsand')->user()->name ;
      $reques->masnod_message = $request->message;
      $hold->save();
      $reques->save();
      return redirect('vsand/dashboard');
    }

    public function edit_sand(Sand $sand){

      return view('edit_sand')->with(['sand'=>$sand]);
    }

    public function recieve(Request $request){
      $recieved=abs($request->recieved);
      $request = Masnod_request::find(request('id'));
      if($request->category == 'monetary')
      $this->validate(request(),['recieved'=>'bail|required|numeric|min:'.($request->value+Payment::where('sand',$request->sand_id)->where('request',$request->id)->first()->total_money)]);
      $request->request_status='vs';
      $sand = Sand::find($request->sand_id);
      $sand->pocket+=$recieved;
      $request->save();
      $sand->save();
      return redirect('vsand/dashboard');
    }

    public function take_request(Request $request){

      $req = Masnods_help::find($request->id);
      $req->vsand_id = session('vsand');
      $req->delivery_date = $request->d_date;
      $req->save();
      return redirect('/vsand/dashboard');
    }

    public function change_sand(Request $request){
      $req = Sand::find($request->id);
      $req->charge = $request->per;
      $req->save();
      return redirect('/vsand/dashboard');
    }

    public function index()
    {
      if(session('vsand')==null)
        return redirect('/');
        $sands = Sand::all();
        $requests = Masnods_help::where('request_status','s')->where('vsand_id',null)->where('escalate','!=',1)->get();
        $vrequests = Masnods_help::where('request_status','s')->orwhere('request_status','vs')->get();
        $vrequests = $vrequests->where('vsand_id',session('vsand'))->where('escalate','!=',1);
//
        return view('vsandd')->with(['requests'=>$requests,'vrequests'=>$vrequests,'sands' => $sands]);
    }
}
