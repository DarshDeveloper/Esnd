<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@extends('admin.layout')
@section('content')
    <div class="sub_container">
        <label> Requests Profile </label>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Request Description</th>
                <th>Masnod Status</th>
                <th>Escalate</th>
                <th>Request Status</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            {{--@foreach($sands as $sands)--}}
            <tr>
                {!! Form::open(['route'=>['request_edit','id'=>$req->id],'method'=>'post']) !!}
                <td><input type="text" value="{!! $req->request_description !!}" name="request_description"></td>
                <td><input type="text" value="{!! $req->masnod_status !!}" name="masnod_status"></td>
                <td><input type="text" value="{!! $req->escalate !!}" name="escalate"></td>
                <td><input type="text" value="{!! $req->request_status !!}" name="request_status"></td>
                <td>

                    <div class='btn-group'>
                        {!! Form::button('<i class="fas fa-edit"></i>', ['type' => 'submit']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            {{--@endforeach--}}
            </tbody>
        </table>
    </div>
@endsection
