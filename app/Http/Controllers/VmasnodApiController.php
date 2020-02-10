<?php

namespace App\Http\Controllers;

use App\Masnod;
use App\Masnod_request;
use App\Vmasnod;
use App\Hold;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VmasnodApiController extends Controller
{
    //    create new vmasnod
    public function VmasnodRegister(Request $request)
    {
        $vmasnod = Vmasnod::where('email', $request['email'])->get();

        if (count($vmasnod) != 0) {
            $redata = array();
            $response = 'Email Already Exist';
            $status = '0';
            $send = [
                'data' => $redata, 'response' => $response, 'status' => $status
            ];

            $vmasnod = Vmasnod::where('social_id', $request['social_id'])->get();
            if (count($vmasnod) != 0) {
                $redata = array();
                $response = 'Social Id Already Exist';
                $status = '0';
                $send = [
                    'data' => $redata, 'response' => $response, 'status' => $status
                ];

                $vmasnod = Vmasnod::where('telephone', $request['telephone'])->get();
                if (count($vmasnod) != 0) {
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

        if (count($vmasnod) == 0) {
            $register = new Vmasnod;
            $register->name = $request['name'];
            $register->email = $request['email'];
            $register->governorate = $request['governorate'];
            $register->address = $request['address'];
            $register->telephone = $request['telephone'];
            $register->social_id = $request['social_id'];
            $register->password = Hash::make($request['password']);
            $register->save();

            $response = 'success';
            $status = '2';
            $send = ['data' => $register,
                'response' => $response, 'status' => $status
            ];

            return json_encode($send);
        } else {
            $redata = array();
            $response = 'User Already Exist';
            $status = '0';
            $send = [
                'data' => $redata, 'response' => $response, 'status' => $status
            ];
            return json_encode($send);
        }

    }

//    show vmasnod's profile

    public function GetVmasnod($id){
        $vmasnod =  Vmasnod::find($id);
        return response()->json($vmasnod);
    }

//    edit vmasnod's profile

    public function UpdateVmasnod(Request $request){
        $vmasnod = Vmasnod::find($request->vmasnod_id);
        $vmasnod->name = $request->name;
        $vmasnod->email = $request->email;
        $vmasnod->governorate = $request->governorate;
        $vmasnod->address = $request->address;
        $vmasnod->telephone = $request->telephone;
        $vmasnod->social_id = $request->social_id;

        $response = 'success';
        $send = ['data' => $vmasnod,
            'response' => $response
        ];

        return $vmasnod->save() ? response()->json($send) : response()->json(0);
    }

//    validate masnods
//    get all masnods

    public function GetAllNewMasnodsToValidate()
    {
        $masnod = Masnod::where('valid',0)->get();
        return response()->json($masnod);
    }

//    confirm masnod register

    public function ConfirmMasnodRegister(Request $request){
        $masnod = Masnod::find($request->id);
        $masnod->valid = 1;

        $response = 'success';
        $send = ['data' => $masnod,
            'response' => $response
        ];

        return $masnod->save() ? response()->json($send) : response()->json(0);
    }

//    escalate masnod register

    public function EscalateMasnodRegister(Request $request){
        $masnod = Masnod::find($request->masnod_id);
        $masnod->valid = 2;
        $masnod->hold_message = $request->hold_message;

        $hold_masnod = new Hold;
        $hold_masnod->message = $request->hold_message;
        $hold_masnod->hold = $request->masnod_id;
        $hold_masnod->name = $request->vmasnod_name;
        // $hold_masnod->created_at = \Carbon\Carbon::now();
        // $hold_masnod->updated_at = \Carbon\Carbon::now();
        $hold_masnod->save();

        $response = 'success';
        $send = ['data' => $masnod,
            'hold_masnod_data' => $hold_masnod,
            'response' => $response
        ];

        return $masnod->save() ? response()->json($send) : response()->json(0);
    }

//    hold masnod register

    public function HoldMasnodRegister(Request $request){
        $masnod = Masnod::find($request->masnod_id);
        // $masnod->valid = 3;
        $masnod->hold_message = $request->hold_message;

        $hold_masnod = new Hold;
        $hold_masnod->message = $request->hold_message;
        $hold_masnod->hold = $request->masnod_id;
        $hold_masnod->name = $request->vmasnod_name;
        // $hold_masnod->created_at = \Carbon\Carbon::now();
        // $hold_masnod->updated_at = \Carbon\Carbon::now();
        $hold_masnod->save();

        $response = 'success';
        $send = ['data' => $masnod,
            'hold_masnod_data' => $hold_masnod,
            'response' => $response
        ];

        return $masnod->save() ? response()->json($send) : response()->json(0);
    }

//    Hold masnod request

    public function HoldMasnodRequest(Request $request){
        $any_request = Masnod_request::find($request->request_id);
        // $any_request->valid = 3;
        // $any_request->vmasnod_id = $request->vmasnod_id;
        $any_request->masnod_message = $request->vmasnod_message;
        $any_request->updated_at = \Carbon\Carbon::now();

        $messages = new Message;
        $messages->	message = $request->vmasnod_message;
        $messages->	hold = $request->request_id;
        $messages->	type = "vmasnod";
        $messages->	name = $request->vmasnod_name;
        $messages->save();

        $response = 'success';
        $send = ['data' => $any_request,
            'message_data' => $messages,
            'response' => $response
        ];

        return $any_request->save() ? response()->json($send) : response()->json(0);
    }

//    show hold masnod messages

    public function GetHoldMasnodMessages($masnod_id){
        $hold_messages =  Hold::where('hold', $masnod_id)->get();;
        return response()->json($hold_messages);
    }

//    show hold masnod request messages

    public function GetHoldMasnodRequestMessages($request_id){
        $hold_messages =  Message::where('hold', $request_id)->where('type', "vmasnod")->get();;
        return response()->json($hold_messages);
    }

//    Escalate masnod requests

public function EscalateMasnodRequest(Request $request)
{
    $any_request = Masnod_request::find($request->request_id);
        $any_request->escalate = 1;
        // $any_request->vmasnod_id = $request->vmasnod_id;
        $any_request->masnod_message = $request->vmasnod_message;
        $any_request->updated_at = \Carbon\Carbon::now();

        $messages = new Message;
        $messages->	message = $request->vmasnod_message;
        $messages->	hold = $request->request_id;
        $messages->	type = "vmasnod";
        $messages->	name = $request->vmasnod_name;
        $messages->save();

        $response = 'success';
        $send = ['data' => $any_request,
            'message_data' => $messages,
            'response' => $response
        ];

    return $any_request->save() ? response()->json($send) : response()->json(0);
}

}
