<?php

namespace App\Http\Controllers;

use App\Masnod_request;
use App\Payment;
use App\Sand;
//use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RequestApiController extends Controller
{
//    add masnod's request
    public function AddMasnodRequest(Request $request)
    {
          if ($request->hasFile('attachment')){
            $filenamewithExt = $request->file('attachment')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
            $extension = $request->file('attachment')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('attachment')->storeAs('attachments',$fileNameToStore);
          }else{
           $fileNameToStore = ' ';
          }
        $masnod_request = new Masnod_request();
        $masnod_request->request_description = $request->request_description;
        $masnod_request->category = $request->category;
        $masnod_request->attachments = $fileNameToStore;
        $masnod_request->masnod_status = $request->masnod_status;
        $masnod_request->request_status = "m";
        $masnod_request->request_date = null;
        $masnod_request->value = null;
        $masnod_request->pickup_method = null;
        // $masnod_request->critical = null;
        // $masnod_request->delivery_attachment = $request->delivery_attachment;
        $masnod_request->created_at = \Carbon\Carbon::now();
        $masnod_request->updated_at = \Carbon\Carbon::now();
        $masnod_request->masnod_id = $request->masnod_id;
        $masnod_request->vmasnod_id = null;
        $masnod_request->sand_id = null;
        $masnod_request->vsand_id = null;
        $masnod_request->vmasnod_2 = null;
        $masnod_request->masnod_message = null;
        // $masnod_request->escalate = 0;
        $masnod_request->delivery_date = null;
        // $masnod_request->charge = 0;
        // $masnod_request->valid = 0;

        $response = 'success';
        $send = ['data' => $masnod_request,
            'response' => $response
        ];

        return $masnod_request->save() ? response()->json($send) : response()->json(0);
    }

//    show all masnod's requests
    public function GetAllMasnodRequest($masnod_id)
    {
        $masnod_request = Masnod_request::where('masnod_id', $masnod_id)->get();
        return response()->json($masnod_request);
    }

//    show one request
    public function GetOneRequest($id)
    {
        $masnod_request = Masnod_request::where('id', $id)->get();
        return response()->json($masnod_request);
    }

//    delete masnod's request
    public function DeleteMasnodRequest($id)
    {
        $request = Masnod_request::find($id);
        $request->delete();
        $response = 'success';
        return response()->json(['response' => $response]);
    }

//    edit masnod's request
    public function UpdateMasnodRequest(Request $request)
    {
          if ($request->hasFile('attachment')){
            $filenamewithExt = $request->file('attachment')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
            $extension = $request->file('attachment')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('attachment')->storeAs('attachments',$fileNameToStore);
          }else{
           $fileNameToStore = ' ';
          }
        $masnod_request = Masnod_request::find($request->masnod_request_id);
        $masnod_request->request_description = $request->request_description;
        $masnod_request->attachments = $fileNameToStore;
        $masnod_request->category = $request->category;
        $masnod_request->masnod_status = $request->masnod_status;
        // $masnod_request->request_status = $request->request_status;
        // $masnod_request->request_date = $request->request_date;
        $masnod_request->value = null;
        $masnod_request->pickup_method = null;
        $masnod_request->critical = 0;
        $masnod_request->vmasnod_id = null;
        $masnod_request->sand_id = null;
        $masnod_request->vsand_id = null;
        $masnod_request->updated_at = \Carbon\Carbon::now();

        $response = 'success';
        $send = ['data' => $masnod_request,
            'response' => $response
        ];

        return $masnod_request->save() ? response()->json($send) : response()->json(0);
    }

//    show all masnod requests for vmasnod
    public function GetAllMasnodRequestsForVmasnod()
    {
        $masnod_request = Masnod_request::where('request_status', 'm')->get();
        return response()->json($masnod_request);
    }

//    approve masnod's request

    public function ApproveMasnodRequest(Request $request)
    {
        $vmasnod_request = Masnod_request::find($request->request_id);
        $vmasnod_request->request_status = "vm";
        $vmasnod_request->value = $request->value;
        $vmasnod_request->vmasnod_id = $request->vmasnod_id;
        $vmasnod_request->delivery_date = $request->delivery_date;
        $vmasnod_request->updated_at = \Carbon\Carbon::now();

        $response = 'success';
        $send = ['data' => $vmasnod_request,
            'response' => $response
        ];

        return $vmasnod_request->save() ? response()->json($send) : response()->json(0);
    }

//    make masnod's request old

    public function MakeMasnodRequestOld(Request $request)
    {
        $vmasnod_request = Masnod_request::find($request->request_id);
        $vmasnod_request->request_status = "o";
        $vmasnod_request->vmasnod_id = $request->vmasnod_id;
        $vmasnod_request->delivery_date = $request->delivery_date;
        $vmasnod_request->updated_at = \Carbon\Carbon::now();

        $response = 'success';
        $send = ['data' => $vmasnod_request,
            'response' => $response
        ];

        return $vmasnod_request->save() ? response()->json($send) : response()->json(0);
    }

//    add vmasnod's request

    public function AddVmasnodRequest(Request $request)
    {
        if ($request->hasFile('attachment')){
            $filenamewithExt = $request->file('attachment')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
            $extension = $request->file('attachment')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('attachment')->storeAs('attachments',$fileNameToStore);
          }else{
           $fileNameToStore = ' ';
          }
        $vmasnod_request = new Masnod_request();
        $vmasnod_request->category = $request->category;
        $vmasnod_request->request_description = $request->request_description;
        $vmasnod_request->masnod_status = $request->masnod_status;
        $vmasnod_request->request_status = "vm";
        $vmasnod_request->delivery_date = $request->delivery_date;
        $vmasnod_request->value = $request->value;
        $vmasnod_request->attachments = $fileNameToStore;
        $vmasnod_request->valid = 1;
        $vmasnod_request->masnod_id = $request->masnod_id;
        $vmasnod_request->vmasnod_id = $request->vmasnod_id;
        $vmasnod_request->pickup_method = null;
        $vmasnod_request->sand_id = null;
        $vmasnod_request->vsand_id = null;
        $vmasnod_request->created_at = \Carbon\Carbon::now();
        $vmasnod_request->updated_at = \Carbon\Carbon::now();

        $response = 'success';
        $send = ['data' => $vmasnod_request,
            'response' => $response
        ];

        return $vmasnod_request->save() ? response()->json($send) : response()->json(0);
    }

//    show vmasnod's request

    public function GetVmasnodRequests($vmasnod_id)
    {
        $vmasnod_request = Masnod_request::where('vmasnod_id', $vmasnod_id )->get();
        return response()->json($vmasnod_request);
    }

//    edit vmasnod's request

    public function UpdateVmasnodRequest(Request $request)
    {
        if ($request->hasFile('attachment')){
            $filenamewithExt = $request->file('attachment')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
            $extension = $request->file('attachment')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('attachment')->storeAs('attachments',$fileNameToStore);
          }else{
           $fileNameToStore = ' ';
          }
        $vmasnod_request = Masnod_request::find($request->request_id);
        $vmasnod_request->category = $request->category;
        $vmasnod_request->request_description = $request->request_description;
        $vmasnod_request->masnod_status = $request->masnod_status;
        // $vmasnod_request->request_status = "vm";
        // $vmasnod_request->request_date = $request->request_date;
        $vmasnod_request->delivery_date = $request->delivery_date;
        $vmasnod_request->value = $request->value;
        // $vmasnod_request->critical = $request->critical;
        $vmasnod_request->attachments = $fileNameToStore;
        $vmasnod_request->updated_at = \Carbon\Carbon::now();

        $response = 'success';
        $send = ['data' => $vmasnod_request,
            'response' => $response
        ];

        return $vmasnod_request->save() ? response()->json($send) : response()->json(0);
    }

//    show all vmasnod requests for sand
    public function GetAllVmasnodRequestsForSand()
    {
        $vmasnod_request = Masnod_request::where('request_status', 'vm')->get();
        return response()->json($vmasnod_request);
    }

//    select sand's request

    public function UpdateSandRequest(Request $request)
    {
        $sand_request = Masnod_request::find($request->request_id);
        $sand_request->request_status = "s";
        $sand_request->sand_id = $request->sand_id;
        $sand_request->updated_at = \Carbon\Carbon::now();

        $payments = new Payment;
        $payments->sand = $request->sand_id;
        $payments->request = $request->request_id;
        $payments->save();
        $sand = Sand::find($request->sand_id);
        $sand->pocket=$sand->pocket-$sand_request->value;
        $sand->save();
        $response = 'success';
        $send = ['request_data' => $sand_request,
            'payments_data' => $payments,
            'sand_data' => $sand,
            'response' => $response
        ];

        return $sand_request->save() ? response()->json($send) : response()->json(0);
    }

//    show sand's request

    public function GetSandRequests($sand_id)
    {
        $sand_request = Masnod_request::where('sand_id', $sand_id)->get();
        return response()->json($sand_request);
    }

//    delete sand's request

    public function DeleteSandRequest(Request $request)
    {
        $sand_request = Masnod_request::find($request->request_id);
        $sand_request->request_status = "vm";
        $sand_request->pickup_method = null;
        $sand_request->sand_id = null;
        $sand_request->updated_at = \Carbon\Carbon::now();

        $payments = Payment::where('request', $request->request_id)->get();
        foreach ($payments as $payments_delete){
            $payments_delete->delete();
        }

        $sand = Sand::find($request->sand_id);
        $sand->pocket=$sand->pocket+$sand_request->value;
        $sand->save();

        $response = 'success';
        $send = ['data' => $sand_request,
            // 'payments_data' => $payments,
            'sand_data' => $sand,
            'response' => $response
        ];

        return $sand_request->save() ? response()->json($send) : response()->json(0);
    }

//    show all sand requests for vsand
    public function GetAllSandRequestsForVsand()
    {
        $sand_request = Masnod_request::where('request_status', 's')->get();
        return response()->json($sand_request);
    }

//    select vsand's request

    public function SelectVsandRequest(Request $request)
    {
        $vsand_request = Masnod_request::find($request->request_id);
        $vsand_request->request_status = "s";
        $vsand_request->vsand_id = $request->vsand_id;
        $vsand_request->delivery_date = $request->delivery_date;
        $vsand_request->updated_at = \Carbon\Carbon::now();

        $response = 'success';
        $send = ['data' => $vsand_request,
            'response' => $response
        ];

        return $vsand_request->save() ? response()->json($send) : response()->json(0);
    }

//    show vsand's requests to update
    public function GetVsandRequestsToUpdate($vsand_id)
    {
        $vsand_request = Masnod_request::where('request_status', 's')->where('vsand_id', $vsand_id)->get();
        return response()->json($vsand_request);
    }

//    update vsand's request

    public function UpdateVsandRequest(Request $request)
    {
        $vsand_request = Masnod_request::find($request->request_id);
        $vsand_request->request_status = "vs";
        // $vsand_request->value = $request->value;
        // $vsand_request->vsand_id = $request->vsand_id;
        // $vsand_request->delivery_date = $request->delivery_date;
        $vsand_request->updated_at = \Carbon\Carbon::now();

        $response = 'success';
        $send = ['data' => $vsand_request,
            'response' => $response
        ];

        return $vsand_request->save() ? response()->json($send) : response()->json(0);
    }

//    show all vsand requests for vmasnod
    public function GetAllVsandRequestsForVmasnod()
    {
        $vsand_request = Masnod_request::where('request_status', 'vs')->get();
        return response()->json($vsand_request);
    }

//    take delivered request

    public function TakeDeliveredRequest(Request $request)
    {
        $vsand_request = Masnod_request::find($request->request_id);
        $vsand_request->request_status = "vm2";
        $vsand_request->delivery_date = $request->delivery_date;
        $vsand_request->vmasnod_2 = $request->vmasnod_2;
        $vsand_request->updated_at = \Carbon\Carbon::now();

        $response = 'success';
        $send = ['data' => $vsand_request,
            'response' => $response
        ];

        return $vsand_request->save() ? response()->json($send) : response()->json(0);
    }

//    show vmasnod's requests to update
    public function GetVmasnodRequestsToUpdate($vmasnod_2)
    {
        $vmasnod_request = Masnod_request::where('request_status', 'vm2')->where('vmasnod_2', $vmasnod_2)->get();
        return response()->json($vmasnod_request);
    }

//    edit delivered request

    public function UpdateDeliveredRequest(Request $request)
    {
        if ($request->hasFile('delivery_attachment')){
            $filenamewithExt = $request->file('delivery_attachment')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
            $extension = $request->file('delivery_attachment')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('delivery_attachment')->storeAs('attachments',$fileNameToStore);
          }else{
           $fileNameToStore = ' ';
          }
        $vsand_request = Masnod_request::find($request->request_id);
        $vsand_request->request_status = "d";
        $vsand_request->delivery_attachment = $fileNameToStore;
        // $vsand_request->vmasnod_2 = $request->vmasnod_2;
        $vsand_request->updated_at = \Carbon\Carbon::now();

        $response = 'success';
        $send = ['data' => $vsand_request,
            'response' => $response
        ];

        return $vsand_request->save() ? response()->json($send) : response()->json(0);
    }
}
