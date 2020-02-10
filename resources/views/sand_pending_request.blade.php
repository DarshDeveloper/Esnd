<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@extends('admin.layout')
@section('content')
    <div class="sub_container">
        <label> Pending Requests </label>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>request_description</th>
                <th>category</th>
                <th>attachments</th>
                <th>masnod_status</th>
                <th>request_date</th>
                <th>value</th>
                <th>pickup_method</th>
                <th>critical</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>masnod's name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($masnods_request as $masnods_request)
                <tr>
                    <td>{!! $masnods_request->request_description !!}</td>
                    <td>{!! $masnods_request->category !!}</td>
                    <td><img src="//esndco.com/public/attachments/{!! $masnods_request->attachments !!}" style="width:100px;height:100px"></td>
                    <td>{!! $masnods_request->masnod_status !!}</td>
                    <td>{!! $masnods_request->request_date !!}</td>
                    <td>{!! $masnods_request->value !!}</td>
                    <td>{!! $masnods_request->pickup_method !!}</td>
                    <td>{!! $masnods_request->critical !!}</td>
                    <td>{!! $masnods_request->created_at !!}</td>
                    <td>{!! $masnods_request->updated_at !!}</td>
                    <td>{!! $masnods_request->name->name !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

