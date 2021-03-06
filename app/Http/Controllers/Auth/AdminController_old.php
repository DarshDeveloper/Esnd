<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Masnod;
use App\Vmasnod;
use App\Sand;
use App\Vsand;
use App\Masnod_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }
public function getdonereq()
{

    $masnods_request = new Masnod_request();
    $masnods_request = Masnod_request::where('request_status','d')->get();
    foreach ($masnods_request as $request){
        $request->name = Masnod::find($request->masnod_id);
    }
    return view('Completed_Requests')->with(['masnods_request'=> $masnods_request]);
}
    public function getmasnodescalation()
    {

        $esc = new Masnod();
        $esc = Masnod::where('valid','2')->get();
        return view('masnod_escalation')->with(['escalation'=> $esc]);
    }
    public function getsandescalation()
    {

        $esc = new Sand();
        $esc = Sand::where('valid','2')->get();
        return view('sand_escalation')->with(['escalation'=> $esc]);
    }
    public function getreqescalation()
    {

        $esc = new Masnod_request();
        $esc = Masnod_request::where('valid','2')->get();
        foreach ($esc as $request){
            $request->name = Masnod::find($request->masnod_id);
        }
        return view('request_escalation')->with(['escalation'=> $esc]);
    }
    public function getmasnodpendingreq()
    {

        $masnods_request = new Masnod_request();
        $masnods_request = Masnod_request::where('request_status','m')->get();
        foreach ($masnods_request as $request){
            $request->name = Masnod::find($request->masnod_id);
        }
        return view('masnod_pending_request')->with(['masnods_request'=> $masnods_request]);
    }
    public function getvmasnodpendingreq()
    {

        $masnods_request = new Masnod_request();
        $masnods_request = Masnod_request::where('request_status','vm')->get();
        foreach ($masnods_request as $request){
            $request->name = Masnod::find($request->masnod_id);
        }
        return view('vmasnod_pending_request')->with(['masnods_request'=> $masnods_request]);
    }
    public function getsandpendingreq()
    {

        $masnods_request = new Masnod_request();
        $masnods_request = Masnod_request::where('request_status','s')->get();
        foreach ($masnods_request as $request){
            $request->name = Masnod::find($request->masnod_id);
        }
        return view('sand_pending_request')->with(['masnods_request'=> $masnods_request]);
    }
    public function getvsandpendingreq()
    {

        $masnods_request = new Masnod_request();
        $masnods_request = Masnod_request::where('request_status','vs')->get();
        foreach ($masnods_request as $request){
            $request->name = Masnod::find($request->masnod_id);
        }
        return view('vsand_pending_request')->with(['masnods_request'=> $masnods_request]);
    }

   public function getmasnods()
   {
       $masnods= new Masnod();
      $masnods= Masnod::all();
       return view('admin_masnod')->with('masnods', $masnods);
   }
    public function get_request($id){

        $request = Masnod_request::find($id);
        return view('request_profile')->with('req',$request);
    }
    public function get_masnod($id){

        $masnod = Masnod::find($id);
        return view('masnod_profile')->with('masnod',$masnod);
    }
   public function get_sand($id){

       $sand = Sand::find($id);
       return view('sand_profile')->with('sand',$sand);
   }
    public function get_vmasnod($id){

        $vmasnod = Vmasnod::find($id);
        return view('vmasnod_profile')->with('vmasnod',$vmasnod);
    }
    public function get_vsand($id){

        $vsand = Vsand::find($id);
        return view('vsand_profile')->with('vsand',$vsand);
    }
   public function sand_edit(Request $request){

        $sand = Sand::find($request->id);
        $sand->name = $request->name;
        $sand->governorate = $request->governorate;
        $sand->address = $request->address;
        $sand->telephone = $request->telephone;
        $sand->email = $request->email;
       $sand->valid = $request->valid;
        $sand->save();
return redirect('/sandslist');

   }
    public function request_edit(Request $request){

        $req = Masnod_request::find($request->id);
        $req->request_description = $request->request_description;
        $req->attachments = $request->attachments;
        $req->masnod_status = $request->masnod_status;
        $req->value = $request->value;
        $req->pickup_method = $request->pickup_method;
        $req->critical = $request->critical;
        $req->valid = $request->valid;
        $req->save();
        return redirect('/mrequests');

    }
    public function getsands()
    {
        $sands= new Sand();
        $sands= Sand::all();
        return view('admin_sand')->with('sands', $sands);
    }
    public function masnod_edit(Request $request){

        $masnod = Masnod::find($request->id);
        $masnod->social_id = $request->social_id;
        $masnod->name = $request->name;
        $masnod->governorate = $request->governorate;
        $masnod->address = $request->address;
        $masnod->telephone = $request->telephone;
        $masnod->email = $request->email;
        $masnod->valid = $request->valid;
        $masnod->save();
        return redirect('/masnodslist');

    }
    public function vsand_edit(Request $request){

        $vsand = Vsand::find($request->id);
        $vsand->social_id = $request->social_id;
        $vsand->name = $request->name;
        $vsand->governorate = $request->governorate;
        $vsand->address = $request->address;
        $vsand->telephone = $request->telephone;
        $vsand->email = $request->email;
        $vsand->save();
        return redirect('/vsandslist');

    }
    public function getVmasnods()
    {
        $vmasnods= new Vmasnod();
        $vmasnods= Vmasnod::all();
        return view('admin_vmasnod')->with('vmasnods', $vmasnods);
    }
    public function vmasnod_edit(Request $request){

        $vmasnod = Vmasnod::find($request->id);
        $vmasnod->social_id = $request->social_id;
        $vmasnod->name = $request->name;
        $vmasnod->governorate = $request->governorate;
        $vmasnod->address = $request->address;
        $vmasnod->telephone = $request->telephone;
        $vmasnod->email = $request->email;
        $vmasnod->save();
        return redirect('/vmasnodslist');

    }

    public function getVsands()
    {
    $vsands= new Vsand();
    $vsands= Vsand::all();
        return view('admin_vsandd')->with('vsands', $vsands);
    }
    public function sand_destroy($id)
    {
        $sand = Sand::find($id);

        $sand->delete();

        return redirect('/sandslist');
    }
    public function vsand_destroy($id)
    {
        $vsand = Vsand::find($id);

        $vsand->delete();

        return redirect('/vsandslist');
    }
    public function masnod_destroy($id)
    {



        $masnod = Masnod::find($id);

        $masnodreq = Masnod_request::where('masnod_id',$id)->get();
        foreach($masnodreq as $request){
          $request->delete();
        }

        $masnod->delete();

        return redirect('/masnodslist');
    }
    public function vmasnod_destroy($id)
    {
        $vmasnod = Vmasnod::find($id);

        $vmasnod->delete();

        return redirect('/vmasnodslist');
    }
    public function request_destroy($id)
    {
        $req = Masnod_request::find($id);

        $req->delete();

        return redirect('/mrequests');
    }
    public function Vmasnod_Register(Request $request)
    {
        $vmasnod = Vmasnod::where('email', $request['email'])->get();

        if (count($vmasnod) == 0) {
            $vmasnod = new Vmasnod;
            $vmasnod->social_id = $request->social_id;
            $vmasnod->name = $request->name;
            $vmasnod->governorate = $request->governorate;
            $vmasnod->address = $request->address;
            $vmasnod->telephone = $request->telephone;
            $vmasnod->email = $request->email;
            $vmasnod->password = Hash::make($request->password);
            $vmasnod->save();
            return redirect('/vmasnodslist');
        } else {

            $response = 'User Already Exit';
            return $request->$response;
        }

    }
    public function showRegistrationForm()
    {
        return view('auth.admin_vmasnod_register');
    }
    public function Vsand_Register(Request $request)
    {

        $vsand = Vsand::where('email', $request['email'])->get();

        if (count($vsand) == 0) {
            $vsand = new Vsand();
            $vsand->social_id = $request->social_id;
            $vsand->name = $request->name;
            $vsand->governorate = $request->governorate;
            $vsand->address = $request->address;
            $vsand->telephone = $request->telephone;
            $vsand->email = $request->email;
            $vsand->password = Hash::make($request->password);
            $vsand->save();
            return redirect('/vsandslist');
        } else {

            $response = 'User Already Exit';
            return $request->$response;
        }

    }
    public function VsandRegistrationForm()
    {
        return view('auth.admin_vsand_register');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

}
