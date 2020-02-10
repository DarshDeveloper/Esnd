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
            </tr>
            </thead>
            <tbody>
            {{--@foreach($sands as $sands)--}}
            <tr>
                {!! Form::open(['route'=>['masnod_edit','id'=>$masnod->id],'method'=>'post']) !!}
                <td>{!! $masnod->social_id !!}</td>
                <td>{!! $masnod->name !!}</td>
                <td>{!! $masnod->governorate !!}</td>
                <td>{!! $masnod->address !!}</td>
                <td>{!! $masnod->telephone !!}</td>
                <td>{!! $masnod->email !!}</td>
                <td>

                    {!! Form::close() !!}
                </td>
            </tr>
            {{--@endforeach--}}
            </tbody>
        </table>

        @foreach($messages as $message)
          {{$message->message}} {{$message->created_at}}
            <br>
        @endforeach
    </div>
@endsection
