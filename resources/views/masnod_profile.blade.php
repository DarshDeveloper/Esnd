<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@extends('admin.layout')
@section('content')
    <div class="sub_container">
        <label> Masnods Profile </label>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Social ID</th>
                <th>Name</th>
                <th>Governorate</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Valid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            {{--@foreach($sands as $sands)--}}
            <tr>
                {!! Form::open(['route'=>['masnod_edit','id'=>$masnod->id],'method'=>'post']) !!}
                <td><input type="text" value="{!! $masnod->social_id !!}" name="social_id"></td>
                <td><input type="text" value="{!! $masnod->name !!}" name="name"></td>
                <td><input type="text" value="{!! $masnod->governorate !!}" name="governorate"></td>
                <td><input type="text" value="{!! $masnod->address !!}" name="address"></td>
                <td><input type="text" value="{!! $masnod->telephone !!}" name="telephone"></td>
                <td><input type="text" value="{!! $masnod->email !!}" name="email"></td>
                <td><input type="text" value="{!! $masnod->valid !!}" name="valid"></td>
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
