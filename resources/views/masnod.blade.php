<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@extends('admin.layout')
@section('content')
    <div class="sub_container">
        <label> Masnods List </label>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Social ID</th>
                <th>Name</th>
                <th>governorate</th>
                <th>address</th>
                <th>social_id_front_photo</th>
                <th>social_id_back_photo</th>
                <th>telephone</th>
                <th>email</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($masnods as $masnods)
                <tr>
                    <td>{!! $masnods->social_id !!}</td>
                    <td>{!! $masnods->name !!}</td>
                    <td>{!! $masnods->governorate !!}</td>
                    <td>{!! $masnods->address !!}</td>
                    <td><img src="//esndco.com/public/attachments/{!! $masnods->social_id_front_photo !!}"> </td>
                    <td><img src="//esndco.com/public/attachments/{!! $masnods->social_id_back_photo !!}"></td>
                    <td>{!! $masnods->telephone !!}</td>
                    <td>{!! $masnods->email !!}</td>
                    <td>
                        {!! Form::open() !!}
                        <div class='btn-group'>
                            <a href="{!! url('/masnod_profile/'.$masnods->id)!!}" class='btn btn-primary btn-xs'><i class="fas fa-edit"></i></a>
                            <a href="{!! url('/masnodslist/'.$masnods->id)!!}" class='btn btn-danger btn-xs'><i class="fas fa-trash-alt"></i></a>
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
