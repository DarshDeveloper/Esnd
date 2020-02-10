<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@extends('admin.layout')
@section('content')
    <div class="sub_container">
        <label> Masnod Requests Hold </label>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Request Description</th>
                <th>Category</th>
                <th>Attachments</th>
                <th>Masnod Status</th>
                <th>Request Date</th>
                <th>Value</th>
                <th>Pickup Method</th>
                <th>Critical</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Message</th>
            </tr>
            </thead>
            <tbody>
            @foreach($masnod_req_holds as $masnod_req_hold)
            <?php
                $masnod_req_hold = App\Masnod_request::find($masnod_req_hold->hold);
              ?>
            @if($masnod_req_hold)
            @if($masnod_req_hold->request_status == 'vm' ||$masnod_req_hold->request_status == 'm' || $masnod_req_hold->request_status == 'vm2')
                <tr>
                    <td>{!! $masnod_req_hold->request_description !!}</td>
                    <td>{!! $masnod_req_hold->category !!}</td>
                    <td><img src="//esndco.com/public/attachments/{!! $masnod_req_hold->attachments !!}" style="width:100px;height:100px"></td>
                    <td>{!! $masnod_req_hold->masnod_status !!}</td>
                    <td>{!! $masnod_req_hold->request_date !!}</td>
                    <td>{!! $masnod_req_hold->value !!}</td>
                    <td>{!! $masnod_req_hold->pickup_method !!}</td>
                    <td>{!! $masnod_req_hold->critical !!}</td>
                    <td>{!! $masnod_req_hold->created_at !!}</td>
                    <td>{!! $masnod_req_hold->updated_at !!}</td>
                    <td>@foreach(App\Message::where('hold',$masnod_req_hold->id)->get() as $mes)

                            {{$mes->message}} {{$mes->created_at}} <br>@endforeach</td>

                </tr>
              @endif
            @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
