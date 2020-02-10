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
            @foreach($sand_req_holds as $sand_req_hold)
            <?php
                 $sand_req_hold = App\Masnod_request::find($sand_req_hold->hold);
              ?>
            @if($sand_req_hold)
            @if($sand_req_hold->request_status == 's')
                <tr>
                    <td>{!! $sand_req_hold->request_description !!}</td>
                    <td>{!! $sand_req_hold->category !!}</td>
                    <td><img src="//esndco.com/public/attachments/{!! $sand_req_hold->attachments !!}" style="width:100px;height:100px"></td>
                    <td>{!! $sand_req_hold->masnod_status !!}</td>
                    <td>{!! $sand_req_hold->request_date !!}</td>
                    <td>{!! $sand_req_hold->value !!}</td>
                    <td>{!! $sand_req_hold->pickup_method !!}</td>
                    <td>{!! $sand_req_hold->critical !!}</td>
                    <td>{!! $sand_req_hold->created_at !!}</td>
                    <td>{!! $sand_req_hold->updated_at !!}</td>
                    <td>@foreach(App\Message::where('hold',$sand_req_hold->id)->get() as $mes)

                            {{$mes->message}} {{$mes->created_at}} <br>@endforeach</td>


                </tr>
              @endif
            @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
