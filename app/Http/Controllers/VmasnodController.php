<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Masnod_request;
use App\Hold;
use App\Vmasnod;
use Illuminate\Support\Facades\Auth;
use App\Sand;
use App\Message;
use App\Payment;
use App\Masnod;
class VmasnodController extends Controller
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


     public function dashboard(){
       if(session('vmasnod')==null)
         return redirect('/');
       function rr($request){
         $masnod = Masnod::find($request['masnod_id']);
         return $masnod['valid'];
       }
       $vmasnod = Vmasnod::find(session('vmasnod'));
       $requests = Masnod_request::where('vmasnod_id',null)->orWhere('vmasnod_id','0')->where('request_status','m')->get();
       $requests = array_filter(json_decode($requests,true),function($request){
         $masnod = Masnod::find($request['masnod_id']);
         return $masnod['valid'] == 1 && !$request{'escalate'};
       });
       $vrequests = Masnod_request::where('vmasnod_2',session('vmasnod'))->orWhere('vmasnod_id',session('vmasnod'))->get();
       $vsrequests = Masnod_request::where('request_status','vs')->where('vmasnod_2',null)->get();
       $masnods = Masnod::where('valid',0)->where('social_id_front_photo','!=','')->where('social_id_back_photo','!=','')->get();
       $masnods = array_filter(json_decode($masnods,true),function($masnod){
         $requests = Masnod_request::where('masnod_id',$masnod['id'])->get();
         return $requests->count();
       });
       return view('vmasnod')->with(['requests'=>$requests,'vrequests'=>$vrequests,'vsrequests'=>$vsrequests,'masnods'=>$masnods]);
     }

     public function view_masnod($id){
       $masnod = Masnod::find($id);
       $messages = Hold::where('hold',$id)->get();
       return view('view_masnod')->with(['masnod'=>$masnod,'messages'=>$messages]);
     }

     public function approve_request(Request $request){
       $req  = Masnod_request::find($request->id);
       $req->request_status = 'vm' ;
       $req->vmasnod_id = session('vmasnod');
       if($req->category=='monetary')
       {$this->validate($request,['value'=>'required|numeric|min:1'],['value.required'=>'monetary request must have money value']);
       $req->value = $request->value;}
//         if($request->value <=0){
//             return back()->with('error_message','Please Check Money Value Must Be Positive');}
         if($req->category=='monetary')
         {$this->validate($request,['c_value'=>'required|numeric|min:1'],['c_value.required'=>'monetary request must have money value confirm']);
             $req->c_value = $request->c_value;}
//         if($request->c_value <=0){
//             return back()->with('error_message','Please Check Money Value Must Be Positive');}
       $req->delivery_date = $request->d_date;
         if($request->value == $request->c_value){
             $req->save();
             return redirect('/vmasnod/dashboard');
         }
         else
             return back()->with('error_message','Please Check Money Value Confirmation');

     }


    public function vmasnod_edit_request($id){
      $request = Masnod_request::find($id);
      $mrequests = Masnod_request::where('masnod_id',$request->masnod_id)->where('vmasnod_id',session('vmasnod'))->where('request_status','vm')->get();
      $empty_requests = Masnod_request::where('masnod_id',$request->masnod_id)->where('request_status','m');
      $masnod = Masnod::find($request->masnod_id);
      $messages = Message::where('hold',$id)->where('type','vmasnod')->get();
        return view('vmasnod_request')->with(['request'=>$request,'mrequests'=>$mrequests,'masnod'=>$masnod,'messages'=>$messages]);
    }

    public function masnod_verify($id){
      $masnod = Masnod::find($id);
      $masnod->valid = 1;
      $masnod->save();
      return redirect('/vmasnod/dashboard');
    }

    public function masnod_escalate($id){
      $masnod = Masnod::find($id);
      $masnod->valid = 2;
      $masnod->save();
      return redirect('/vmasnod/dashboard');
    }

    public function r_message(Request $request){
      $reques = Masnod_request::find($request->id);
      if($request->method == 'e'){
        $reques->escalate = 1;
      }

      $hold = new Message;
      $hold->message =  $request->message;
      $hold->hold =  $request->id;
      $hold->type =  'vmasnod';
      $hold->name =  Auth::guard('vmasnod')->user()->name ;
      $reques->masnod_message = $request->message;
      $reques->save();
      $hold->save();
      return redirect('vmasnod/dashboard');
    }

    public function vmasnod_add_request(Request $request){
      $this->validate($request,['description'=>'required','category'=>'required','masnod_status'=>'required']);
      $req = Masnod_request::find($request->id);
      $req->request_status ='o';
      $req->vmasnod_id = session('vmasnod');
      $req->delivery_date = $request->d_date;
      $req->masnod_message = '';
      $req->save();
      $new_req = new Masnod_request;
      $new_req->request_description = $request->description;
      $new_req->category = $request->category;
      if($request->category=='monetary')
      {$this->validate($request,['value'=>'required|numeric|min:1'],['value.required'=>'monetary request must have money value']);
      $new_req->value = $request->value;}
      if($request->value <=0){
          return back()->with('error_message','Please Check Money Value Must Be Positive');}
        if($request->category=='monetary')
        {$this->validate($request,['c_value'=>'required|numeric|min:1'],['c_value.required'=>'please confirm money value']);
            $new_req->c_value = $request->c_value;}
        if($request->c_value <=0){
            return back()->with('error_message','Please Check Money Value Must Be Positive');}
      $new_req->masnod_status = $request->masnod_status;
      $new_req->request_status = 'vm';
      $new_req->attachments = $req->attachments;
      $new_req->masnod_id = $req->masnod_id;
      $new_req->vmasnod_id = session('vmasnod');
      $new_req->delivery_date = $request->d_date;
      $new_req->created_at = Carbon::now();
      $new_req->updated_at = Carbon::now();
        if($request->value == $request->c_value){
            $new_req->save();
            return redirect('vmasnod/dashboard');
        }
        else
            return back()->with('error_message','Please Check Money Value Confirmation');

    }


    public function deliver_request(Request $req){
      $this->validate($req,[
        'attachment' => 'required|image'
      ]);
      $request = Masnod_request::find($req->id);
      $payment = Payment::where('sand',$request->sand_id)->where('request',$request->id)->get();
      $sand = Sand::where('id',$request->sand_id)->get();
      if($payment->first()->in_charge == 1 && $request->category != 'monetary')
      {
        $sand->first()->pocket-=abs($req->cost);
      }

      $masnod = Masnod::find(session('masnod'));
      if (request()->hasFile('attachment')){
        $filenamewithExt = request()->file('attachment')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
        $extension = request()->file('attachment')->getClientOriginalExtension();
        $name = $filename.'_'.time().'.'.$extension;
        $path = request()->file('attachment')->storeAs('attachments',$name);
        $request->delivery_attachment = $name;
      }
      $request->vmasnod_2 = session('vmasnod');
      $request->request_status = 'd';
      $payment->first()->total_money = abs($req->cost);
      $request->save();
      $sand->first()->save();
      $payment->first()->save();
      return redirect('vmasnod/dashboard');
    }

    public function vmasnod_update_request(Request $request){
      $masnod_request = Masnod_request::find($request->id);
      $masnod_request->request_description = $request->description;
      $masnod_request->category = $request->category;
      $masnod_request->masnod_status = $request->masnod_status;
      $masnod_request->request_status = 'vm';
      $masnod_request->masnod_message = '';
      $masnod_request->vmasnod_id = session('vmasnod');
      $masnod_request->save();
      return redirect('vmasnod/dashboard');
    }

    public function take_vm2(Request $request){
        $req = Masnod_request::find($request->id);
        $req->vmasnod_2 = session('vmasnod');
        $req->request_status = 'vm2';
        $req->masnod_message = '';
        $req->delivery_date = $request->d_date;
        $req->save();
        return redirect('vmasnod/dashboard');
    }

    public function deliver_request_form($id){
      if(session('vmasnod')==null)
        return redirect('/');
        $masnod_request = Masnod_request::find($id);
        $masnod = Masnod::find($masnod_request->masnod_id);
        $messages = Message::where('hold',$id)->where('type','vmasnod')->get();
        return view('deliver_request_form')->with(['request'=>$masnod_request,'masnod'=>$masnod,'messages'=>$messages]);
    }

    public function message(Request $request){
// return request();
      $masnod = Masnod::find($request->masnod);
      $masnod->hold_message = $request->message;
      if($request->method == 'e'){
        $masnod->valid = 2;
      }
      $hold = new Hold;
      $hold->message =  $request->message;
      $hold->hold =  $request->masnod;
      $hold->name =  Auth::guard('vmasnod')->user()->name ;
      $hold->save();
      $masnod->save();
      return redirect('vmasnod/dashboard');
    }

    public function test(){
      return Hold::select('hold')->groupBy('hold')->get();
    }




}
