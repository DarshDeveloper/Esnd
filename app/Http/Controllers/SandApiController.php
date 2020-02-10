<?php

namespace App\Http\Controllers;

use App\Sand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SandApiController extends Controller
{
//    create new sand
    public function SandRegister(Request $request)
    {
        $sand = Sand::where('email', $request['email'])->get();

        if (count($sand) != 0) {
            $redata = array();
            $response = 'Email Already Exist';
            $status = '0';
            $send = [
                'data' => $redata, 'response' => $response, 'status' => $status
            ];

            $sand = Sand::where('social_id', $request['social_id'])->get();
            if (count($sand) != 0) {
                $redata = array();
                $response = 'Social Id Already Exist';
                $status = '0';
                $send = [
                    'data' => $redata, 'response' => $response, 'status' => $status
                ];

                $sand = Sand::where('telephone', $request['telephone'])->get();
                if (count($sand) != 0) {
                    $redata = array();
                    $response = 'Telephone Already Exist';
                    $status = '0';
                    $send = [
                        'data' => $redata, 'response' => $response, 'status' => $status
                    ];
                }
            }

            return json_encode($send);
        }

        if (count($sand) == 0) {
            $register = new Sand;
            $register->name = $request['name'];
            $register->email = $request['email'];
            $register->governorate = $request['governorate'];
            $register->address = $request['address'];
            $register->telephone = $request['telephone'];
            $register->social_id = $request['social_id'];
            $register->password = Hash::make($request['password']);
            $register->valid = null;
            $register->message = null;
            // $register->charge = "f";
            $register->save();

            $response = 'please setup your payment settings, Please note that your first 3 transaction or first 500LE are for free, Please Note that ESND will charge 10% of your transaction value or transportation value';
            $status = '3';
            $send = ['data' => $register,
                'response' => $response, 'status' => $status
            ];

            return json_encode($send);
        }

    }

//    show sand's profile
    public function GetSand($id)
    {
        $sand = Sand::find($id);
        return response()->json($sand);
    }

//    edit sand's profile
    public function UpdateSand(Request $request)
    {
        $sand = Sand::find($request->sand_id);
        $sand->name = $request->name;
        $sand->email = $request->email;
        $sand->governorate = $request->governorate;
        $sand->address = $request->address;
        $sand->telephone = $request->telephone;
        $sand->social_id = $request->social_id;

        $response = 'success';
        $send = ['data' => $sand,
            'response' => $response
        ];

        return $sand->save() ? response()->json($send) : response()->json(0);
    }
}
