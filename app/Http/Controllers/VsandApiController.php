<?php

namespace App\Http\Controllers;

use App\Masnod_request;
use App\Sand;
use App\Vsand;
use App\Hold;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VsandApiController extends Controller
{
    //    create new vsand

    public function VsandRegister(Request $request)
    {
        $vsand = Vsand::where('email', $request['email'])->get();

        if (count($vsand) != 0) {
            $redata = array();
            $response = 'Email Already Exist';
            $status = '0';
            $send = [
                'data' => $redata, 'response' => $response, 'status' => $status
            ];

            $vsand = Vsand::where('social_id', $request['social_id'])->get();
            if (count($vsand) != 0) {
                $redata = array();
                $response = 'Social Id Already Exist';
                $status = '0';
                $send = [
                    'data' => $redata, 'response' => $response, 'status' => $status
                ];

                $vsand = Vsand::where('telephone', $request['telephone'])->get();
                if (count($vsand) != 0) {
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

        if (count($vsand) == 0) {
            $register = new Vsand;
            $register->name = $request['name'];
            $register->email = $request['email'];
            $register->social_id = $request['social_id'];
            $register->address = $request['address'];
            $register->governorate = $request['governorate'];
            $register->telephone = $request['telephone'];
            $register->password = Hash::make($request['password']);
            $register->save();

            $response = 'success';
            $status = '4';
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

//    show vsand's profile

    public function GetVsand($id){
        $vsand =  Vsand::find($id);
        return response()->json($vsand);
    }

//    edit vsand's profile

    public function UpdateVsand(Request $request){
        $vsand = Vsand::find($request->vsand_id);
        $vsand->name = $request->name;
        $vsand->email = $request->email;
        $vsand->governorate = $request->governorate;
        $vsand->address = $request->address;
        $vsand->telephone = $request->telephone;
        $vsand->social_id = $request->social_id;

        $response = 'success';
        $send = ['data' => $vsand,
            'response' => $response
        ];

        return $vsand->save() ? response()->json($send) : response()->json(0);
    }

//    show vsand's help

    public function get_masnod_help($help_id){
        $help =  Masnod_help::find($help_id);
        return response()->json($help);
    }

//    add vsand's help

    public function add_masnod_help(Request $request){
        $help = new Masnod_help();
        $help->help_description = $request->help_description;
        $help->type_of_help = '';
        $help->category = $request->category;
        $help->masnod_status = $request->masnod_status;
        $help->request_status = $request->request_status;
        $help->masnod_id = $request->masnod_id;
        return $help->save()?response()->json(1):response()->json(0);
    }

//    edit vsand's help

    public function update_masnod_help(Request $request){
        $help = Masnod_help::find($request->masnod_help_id);
        $help->help_description = $request->help_description;
        $help->type_of_help = 'no.jpg';
        $help->category = $request->category;
        $help->masnod_status = $request->masnod_status;
        $help->request_status = $request->request_status;
        return $help->save()?response()->json(1):response()->json(0);
    }

//    validate sands
//    get all sands

    public function GetAllNewSandsToValidate()
    {
        $sand = Sand::where('valid',0)->get();
        return response()->json($sand);
    }

//    confirm masnod register

    public function ConfirmSandRegister(Request $request){
        $sand = Sand::find($request->id);
        $sand->valid = 1;

        $response = 'success';
        $send = ['data' => $sand,
            'response' => $response
        ];

        return $sand->save() ? response()->json($send) : response()->json(0);
    }

//    escalate masnod register

    public function EscalateSandRegister(Request $request){
        $sand = Sand::find($request->id);
        $sand->valid = 2;
//        $sand->admin_message = $request->admin_message;

        $response = 'success';
        $send = ['data' => $sand,
            'response' => $response
        ];

        return $sand->save() ? response()->json($send) : response()->json(0);
    }

//    hold masnod register

    public function HoldSandRegister(Request $request){
        $sand = Sand::find($request->id);
        $sand->valid = 3;
        $sand->hold_message = $request->hold_message;

        $response = 'success';
        $send = ['data' => $sand,
            'response' => $response
        ];

        return $sand->save() ? response()->json($send) : response()->json(0);
    }

//    Hold requests

    public function HoldSandRequests(Request $request){
        $any_request = Masnod_request::find($request->request_id);
        // $any_request->valid = 3;
        // $any_request->vmasnod_id = $request->vmasnod_id;
        $any_request->masnod_message = $request->vsand_message;
        $any_request->updated_at = \Carbon\Carbon::now();

        $messages = new Message;
        $messages->	message = $request->vsand_message;
        $messages->	hold = $request->request_id;
        $messages->	type = "vsand";
        $messages->	name = $request->vsand_name;
        $messages->save();
        
        $response = 'success';
        $send = ['data' => $any_request,
            'message_data' => $messages,
            'response' => $response
        ];

        return $any_request->save() ? response()->json($send) : response()->json(0);
    }

//    show hold sand request messages

    public function GetHoldSandRequestMessages($request_id){
        $hold_messages =  Message::where('hold', $request_id)->where('type', "vsand")->get();;
        return response()->json($hold_messages);
    }

//    Escalate sand requests

public function EscalateSandRequest(Request $request)
{
    $any_request = Masnod_request::find($request->request_id);
        $any_request->escalate = 1;
        // $any_request->vmasnod_id = $request->vmasnod_id;
        $any_request->masnod_message = $request->vsand_message;
        $any_request->updated_at = \Carbon\Carbon::now();

        $messages = new Message;
        $messages->	message = $request->vsand_message;
        $messages->	hold = $request->request_id;
        $messages->	type = "vsand";
        $messages->	name = $request->vsand_name;
        $messages->save();
        
        $response = 'success';
        $send = ['data' => $any_request,
            'message_data' => $messages,
            'response' => $response
        ];

    return $any_request->save() ? response()->json($send) : response()->json(0);
}
}
