<?php

namespace App\Http\Controllers\Auth;

use App\Masnod;
use App\User;
use App\Http\Controllers\Controller;
use App\Vsand;
use Illuminate\Foundation\Auth\RegistersMasnods;
use Illuminate\Foundation\Auth\RegistersVsands;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class VsandRegisterController extends Controller
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

    use RegistersVsands;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
            'address' => 'required|string|max:255',
            'governorate' => 'required|string|max:255',
//            'payment_method' => 'required|string|max:255',
//            'social_id_photo' => 'string|max:255',
//            'social_id' => 'required|string|max:255|unique:users',
//            'status' => 'required|string|max:255',
            'telephone' => 'required|string|max:255|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Vsand::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
//            'payment_method' => $data['payment_method'],
//            'social_id_photo' => $data['social_id_photo'],
//            'social_id' => $data['social_id'],
//            'status' => $data['status'],
            'telephone' => $data['telephone'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
