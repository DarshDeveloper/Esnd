<?php

namespace App\Http\Controllers;

use App\Masnod;
use App\Sand;
use App\User;
use App\Vmasnod;
use App\Vsand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
//    admin login
    public function adminlogin(Request $request)
    {
        $userdata = array(
            'email' => $request['email'],
            'password' => $request['password']
        );

        if (Auth::attempt($userdata)) {
            $user = Auth::user();
            $response = 'You loged in As Admin';
            $status = '5';
            $send = ['data' => $user,
                'response' => $response, 'status' => $status
            ];

            return json_encode($send);


        } else {
            $redata = array();
            $response = 'Your Username or Password incorrect';
            $status = '0';
            $send = [
                'data' => $redata, 'response' => $response, 'status' => $status
            ];
            return json_encode($send);
        }


    }

//    create new admid
    public function adminRegister(Request $request)
    {
        $user = User::where('email', $request['email'])->get();

        if (count($user) == 0) {
            $register = new User();
            $register->name = $request['name'];
            $register->email = $request['email'];
            $register->governorate = $request['governorate'];
            $register->address = $request['address'];
            $register->password = bcrypt($request['password']);
            $register->save();

            $response = 'success';
            $status = '5';
            $send = ['data' => $register,
                'response' => $response, 'status' => $status
            ];

            return json_encode($send);
        } else {
            $redata = array();
            $response = 'User Already Exit';
            $status = '0';
            $send = [
                'data' => $redata, 'response' => $response, 'status' => $status
            ];
            return json_encode($send);
        }


    }

//    masnod, vmasnod, sand and vsand login
    public function login(Request $request)
    {
        $masnod = Masnod::where('email', $request['email'])->get();
        $sand = Sand::where('email', $request['email'])->get();
        $vmasnod = Vmasnod::where('email', $request['email'])->get();
        $vsand = Vsand::where('email', $request['email'])->get();

        if (count($masnod) != 0) {
            if (Hash::check($request['password'], $masnod[0]->password)) {
                $response = 'You loged in As Masnod';
                $status = '1';
                $send = ['data' => $masnod,
                    'response' => $response, 'status' => $status
                ];
                return json_encode($send);

            }else{
                $redata = array();
                // $response = 'Your Password incorrect';
                $response = 'Your Username or Password incorrect';
                $status = '0';
                $send = [
                    'data' => $redata, 'response' => $response, 'status' => $status
                ];
                return json_encode($send);
            }
        }
        elseif (count($sand) != 0) {
            if (Hash::check($request['password'], $sand[0]->password)) {
                $response = 'You loged in As Sand';
                $status = '3';
                $send = ['data' => $sand,
                    'response' => $response, 'status' => $status
                ];

                return json_encode($send);
            }else{
                $redata = array();
                // $response = 'Your Password incorrect';
                $response = 'Your Username or Password incorrect';
                $status = '0';
                $send = [
                    'data' => $redata, 'response' => $response, 'status' => $status
                ];
                return json_encode($send);
            }


        }
        elseif (count($vmasnod) != 0) {
            if (Hash::check($request['password'], $vmasnod[0]->password)) {
                $response = 'You loged in As Vmasnod';
                $status = '2';
                $send = ['data' => $vmasnod,
                    'response' => $response, 'status' => $status
                ];

                return json_encode($send);
            }else{
                $redata = array();
                // $response = 'Your Password incorrect';
                $response = 'Your Username or Password incorrect';
                $status = '0';
                $send = [
                    'data' => $redata, 'response' => $response, 'status' => $status
                ];
                return json_encode($send);
            }


        }
        elseif (count($vsand) != 0) {
            if (Hash::check($request['password'], $vsand[0]->password)) {
                $response = 'You loged in As Vsand';
                $status = '4';
                $send = ['data' => $vsand,
                    'response' => $response, 'status' => $status
                ];

                return json_encode($send);
            }else{
                $redata = array();
                // $response = 'Your Password incorrect';
                $response = 'Your Username or Password incorrect';
                $status = '0';
                $send = [
                    'data' => $redata, 'response' => $response, 'status' => $status
                ];
                return json_encode($send);
            }


        }
        else{

            $redata = array();
            $response = 'Your Username or Password incorrect';
            $status = '0';
            $send = [
                'data' => $redata, 'response' => $response, 'status' => $status
            ];
            return json_encode($send);

        }

    }

}
