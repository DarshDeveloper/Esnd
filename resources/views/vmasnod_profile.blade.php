<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@extends('admin.layout')
@section('content')
    <div class="sub_container">
        <label> VMasnods Profile </label>
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
            {{--@foreach($sands as $sands)--}}
            <tr>
                {!! Form::open(['route'=>['vmasnod_edit','id'=>$vmasnod->id],'method'=>'post']) !!}
                <td><input type="text" value="{!! $vmasnod->social_id !!}" name="social_id"></td>
                <td><input type="text" value="{!! $vmasnod->name !!}" name="name"></td>
                <td><input type="text" value="{!! $vmasnod->governorate !!}" name="governorate"></td>
                <td><input type="text" value="{!! $vmasnod->address !!}" name="address"></td>
                <td><input type="text" value="{!! $vmasnod->telephone !!}" name="telephone"></td>
                <td><input type="text" value="{!! $vmasnod->email !!}" name="email"></td>
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
