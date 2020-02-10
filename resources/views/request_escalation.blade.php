<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@extends('admin.layout')
@section('content')
    <div class="sub_container">

        <label> Escalations </label>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>request_description</th>
                <th>masnod_status</th>
                <th>value</th>
                <!-- <th>pickup_method</th> -->
                <th>attachments</th>
                <th>critical</th>
                <th>Masnod</th>
                <th>message</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($escalation as $escalation)
                <tr>
                    <td>{!! $escalation->request_description !!}</td>
                    <td>{!! $escalation->masnod_status !!}</td>
                    <td>{!! $escalation->value !!}</td>
                    <!-- <td>{!! $escalation->pickup_method !!}</td> -->
                    <td><img src="//esndco.com/public/attachments/{!! $escalation->attachments !!}" style="width:100px;height:100px"> </td>
                    <td>{!! $escalation->critical !!}</td>
                    <td>{!! $escalation->name->name !!}</td>
                    <td>{{$escalation->masnod_message}}</td>
                    <td>
                        {!! Form::open() !!}
                        <div class='btn-group'>
                            <a href="{!! url('/request_profile/'.$escalation->id)!!}" class='btn btn-primary btn-xs'><i class="fas fa-edit"></i></a>
                            <a href="{!! url('/mrequests/'.$escalation->id)!!}" class='btn btn-danger btn-xs'><i class="fas fa-trash-alt"></i></a>
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
