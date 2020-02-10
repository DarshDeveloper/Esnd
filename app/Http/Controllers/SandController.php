<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masnods_help;
use App\Sand;
use App\Payment;
use App\Masnod;
use PDF;
class SandController extends Controller
{
    public function pdf()
    {
        if(session('sand')==null)
            return redirect('/');
        $sand = Sand::find(session('sand'));
        $requests = Masnods_help::where('request_status','vm')->get();
        $srequests = Masnods_help::where('sand_id',session('sand'))->get();
        $pdf = PDF::loadView('sand_report', ['sand'=>$sand,'requests'=>$requests,'srequests'=>$srequests]);
        return $pdf->download('Report.pdf');
    }
    public function report()
    {

        if(session('sand')==null)
            return redirect('/');
            $sand = Sand::find(session('sand'));
            $requests = Masnods_help::where('request_status', 'vm')->get();
            $srequests = Masnods_help::where('sand_id', session('sand'))->get();
            return view('sand_report')->with(['sand' => $sand, 'requests' => $requests, 'srequests' => $srequests ]);

    }
    public function index()
    {
      if(session('sand')==null)
        return redirect('/');
        $sand = Sand::find(session('sand'));
        $in_charge = Payment::where('sand',session('sand'))->where('in_charge',1)->first();
        $requests = Masnods_help::where('request_status','vm')->get();
        $srequests = Masnods_help::where('sand_id',session('sand'))->get();
        return view('sand')->with(['sand'=>$sand,'requests'=>$requests,'srequests'=>$srequests, 'link'=>$in_charge]);
    }


    public function take_request($id){
      if(session('sand')==null)
        return redirect('/');
        $request = Masnods_help::find($id);
      $sand = Sand::find(session('sand'))->charge;
     $fee = Masnods_help::where('sand_id',session('sand'))->get();
      if($fee->count()>2||($request->value&&$fee->pluck('value')->sum()+$request->value>500)||(!$request->value&&$fee->pluck('value')->sum()+$request->value>=500))
      if($request->category=='monetary')
      $request->fee=$request->value/100*$sand;
      else
      $request->fee=$request->value;



      $requests = Masnods_help::where('masnod_id',$request->masnod_id)->where('request_status','vm')->get();
      $masnod = Masnod::find($request->masnod_id);
      return view('sand_take_request')->with(['request'=>$request,'masnod'=>$masnod,'requests'=>$requests]);
    }




    public function delete_sand_request($id){
      if(session('sand')==null)
        return redirect('/');
      $request = Masnods_help::find($id);
      $sand = Sand::find(session('sand'));
      $sand->pocket = $sand->pocket+$request->value;
      $payment = Payment::where('sand',$sand->id)->where('request',$id)->first();
      $request->request_status = 'vm';
      $sand->pocket = $sand->pocket+$payment->total_money;
      $payment->delete();
      $request->sand_id = NULL ;
      $sand->save();
      $request->save();
        return redirect('sand/dashboard');
    }


    public function confirm_request(Request $request){
// dd($request->all());
      $sand = Sand::find(session('sand'));
      $payment = new Payment;
      $request = Masnods_help::find($request->id);
      // return $request->category;
      if(request()->value)
      {if((int)request()->value){
        $payment->total_money=abs((int)request()->value);
        $sand->pocket = $sand->pocket-$payment->total_money;}
        $payment->in_charge = 1;
      }
      $sand->pocket = $sand->pocket-$request->value;
      $sand->save();
      $payment->sand = $sand->id;
      $request->request_status = 's';
      $request->sand_id = session('sand');
      $payment->request=$request->id;
      $request->save();
      $payment->save();
      return redirect('/sand/dashboard');
    }


}
