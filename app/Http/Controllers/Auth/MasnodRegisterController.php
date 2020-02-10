<?php

namespace App\Http\Controllers\Auth;

use App\Masnod;
use Illuminate\Http\Request;
use App\Masnods_help;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class MasnodRegisterController extends Controller
{

  public function showRegistrationForm(){
    return view('auth/masnod_register');
  }

  public function register(Request $request){
    $request->validate([
      'email' => 'required|email|unique:masnods',
      'name' => 'required',
      'social_id' => 'required|numeric|unique:masnods|digits:14',
      'telephone' => 'required|numeric|unique:masnods',
      'password' => 'required|confirmed|min:6',
      'address' => 'required|max:255',
//        'lat' => 'required',
//        'lng' => 'required',
      'governorate' => 'required|max:255',
    ]);
    $masnod = Masnod::where('email', $request['email'])->get();

    if (count($masnod) == 0) {
        $register = new Masnod;
        $register->name = $request['name'];
        $register->email = $request['email'];
        $register->social_id = $request['social_id'];
        $register->governorate = $request['governorate'];
        $register->address = $request['address'];
//        $register->lat 	 = $request['lat'];
//        $register->lng	 =  $request['lng'];
        $register->telephone = $request['telephone'];
        $register->password = Hash::make($request['password']);
        $register->save();

        if ( Auth::guard('masnod')->attempt(['email' => $register->email, 'password' => $request->password])) {
                session(['masnod' => $register->id]);
                return redirect('masnod/dashboard');
        }
        else return 'attemp again';
    } else {
        return back()->withErrors(['user already exists']);
    }
  }


}
