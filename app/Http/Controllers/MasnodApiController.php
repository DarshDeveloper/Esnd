<?php

namespace App\Http\Controllers;

use App\Masnod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasnodApiController extends Controller
{
//    create new masnod
    public function MasnodRegister(Request $request)
    {
        $masnod = Masnod::where('email', $request['email'])->get();

        if (count($masnod) != 0) {
            $redata = array();
            $response = 'Email Already Exist';
            $status = '0';
            $send = [
                'data' => $redata, 'response' => $response, 'status' => $status
            ];

            $masnod = Masnod::where('social_id', $request['social_id'])->get();
            if (count($masnod) != 0) {
                $redata = array();
                $response = 'Social Id Already Exist';
                $status = '0';
                $send = [
                    'data' => $redata, 'response' => $response, 'status' => $status
                ];

                $masnod = Masnod::where('telephone', $request['telephone'])->get();
                if (count($masnod) != 0) {
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

        if (count($masnod) == 0) {
            $register = new Masnod;
            $register->name = $request['name'];
            $register->email = $request['email'];
            $register->social_id = $request['social_id'];
            $register->governorate = $request['governorate'];
            $register->address = $request['address'];
            $register->telephone = $request['telephone'];
            $register->password = Hash::make($request['password']);
            $register->valid = 0;
            $register->save();

            $response = 'You Registered as Masnod, Wellcom';
            $status = '1';
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

//    show masnod's profile
    public function GetMasnod($id)
    {
        $masnod = Masnod::find($id);
        return response()->json($masnod);
    }

//    edit masnod's profile
    public function UpdateMasnod(Request $request)
    {
        if ($request->hasFile('social_id_front_photo')){
            $filenamewithExt = $request->file('social_id_front_photo')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
            $extension = $request->file('social_id_front_photo')->getClientOriginalExtension();
            $fileNameFrontToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('social_id_front_photo')->storeAs('attachments',$fileNameFrontToStore);
          }else{
           $fileNameFrontToStore = ' ';
          }
          if ($request->hasFile('social_id_back_photo')){
            $filenamewithExt = $request->file('social_id_back_photo')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
            $extension = $request->file('social_id_back_photo')->getClientOriginalExtension();
            $fileNameBackToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('social_id_back_photo')->storeAs('attachments',$fileNameBackToStore);
          }else{
           $fileNameBackToStore = ' ';
          }
        $masnod = Masnod::find($request->masnod_id);
        $masnod->name = $request->name;
        $masnod->email = $request->email;
        $masnod->governorate = $request->governorate;
        $masnod->address = $request->address;
        $masnod->telephone = $request->telephone;
        $masnod->social_id = $request->social_id;
        $masnod->social_id_back_photo = $fileNameBackToStore;
        $masnod->social_id_front_photo = $fileNameFrontToStore;
        
        $response = 'success';
        $send = ['data' => $masnod,
            'response' => $response
        ];

        return $masnod->save() ? response()->json($send) : response()->json(0);
    }

}
