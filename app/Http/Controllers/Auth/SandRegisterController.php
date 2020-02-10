<?php

namespace App\Http\Controllers\Auth;

use App\Masnod;
use App\Sand;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SandRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */



    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

     public function showRegistrationForm(){
       return view('auth/sand_register');
     }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required|string|max:255',
//             'lat' => 'required',
//            'lng' => 'required',
            'governorate' => 'required|string|max:255',
//            'payment_method' => 'required|string|max:255',
//            'social_id_photo' => 'string|max:255',
           'social_id' => 'required|string|max:255|unique:sands|numeric',
//            'status' => 'required|string|max:255',
            'telephone' => 'required|string|unique:sands|numeric',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */


    public function register(Request $request){
      $request->validate([
        'email' => 'required|email|unique:sands',
        'name' => 'required',
        'social_id' => 'required|numeric|unique:sands|digits:14',
        'telephone' => 'required|numeric|unique:sands',
        'password' => 'required|confirmed|min:6',
        'address' => 'required|max:255',
//          'lat' => 'required',
//          'lng' => 'required',
        'governorate' => 'required|max:255',
      ]);
      $sand = Sand::where('email', $request['email'])->get();

      if (count($sand) == 0) {
          $register = new Sand;
          $register->name = $request['name'];
          $register->email = $request['email'];
          $register->social_id = $request['social_id'];
          $register->governorate = $request['governorate'];
          $register->address = $request['address'];
//          $register->lat 	 = $request['lat'];
//          $register->lng	 =  $request['lng'];
          $register->telephone = $request['telephone'];
          $register->password = Hash::make($request['password']);
          $register->save();
	if ( Auth::guard('sand')->attempt(['email' => $register->email, 'password' => $request['password']])) {
                session(['sand' => $register->id]);
                return redirect('sand/dashboard');
        }
        else return 'attemp again';
      } else {
          return back()->withErrors(['user already exists']);
      }
    }

}
