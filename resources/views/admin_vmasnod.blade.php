<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@extends('admin.layout')
@section('content')
    <div class="sub_container">
        <label> VMasnods List </label>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Social ID</th>
                <th>Name</th>
                <th>Governorate</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Email</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vmasnods as $vmasnods)
                <tr>
                    <td>{!! $vmasnods->social_id !!}</td>
                    <td>{!! $vmasnods->name !!}</td>
                    <td>{!! $vmasnods->governorate !!}</td>
                    <td>{!! $vmasnods->address !!}</td>
                    <td>{!! $vmasnods->telephone !!}</td>
                    <td>{!! $vmasnods->email !!}</td>
                    <td>
                        {!! Form::open() !!}
                        <div class='btn-group'>
                            <a href="{!! url('/vmasnod_profile/'.$vmasnods->id)!!}" class='btn btn-primary btn-xs'><i class="fas fa-edit"></i></a>
                            <a href="{!! url('/vmasnodslist/'.$vmasnods->id)!!}" class='btn btn-danger btn-xs'><i class="fas fa-trash-alt"></i></a>
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

