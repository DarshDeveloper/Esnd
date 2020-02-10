<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@extends('admin.layout')
@section('content')
    <div class="sub_container">
        <label> Sands Escalations </label>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Social ID</th>
                <th>Name</th>
                <th>Governorate</th>
                <th>Address</th>
                <th>Social ID Front</th>
                <th>Social ID Back</th>
                <th>Telephone</th>
                <th>Email</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($escalation as $escalation)
                <tr>
                    <td>{!! $escalation->social_id !!}</td>
                    <td>{!! $escalation->name !!}</td>
                    <td>{!! $escalation->governorate !!}</td>
                    <td>{!! $escalation->address !!}</td>
                    <td><img src="//esndco.com/public/attachments/{!! $escalation->social_id_front_photo !!}"> </td>
                    <td><img src="//esndco.com/public/attachments/{!! $escalation->social_id_back_photo !!}"></td>
                    <td>{!! $escalation->telephone !!}</td>
                    <td>{!! $escalation->email !!}</td>
                    <td>
                        {!! Form::open() !!}
                        <div class='btn-group'>
                            <a href="{!! url('/sand_profile/'.$escalation->id)!!}" class='btn btn-primary btn-xs'><i class="fas fa-edit"></i></a>
                            <a href="{!! url('/sandslist/'.$escalation->id)!!}" class='btn btn-danger btn-xs'><i class="fas fa-trash-alt"></i></a>
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

