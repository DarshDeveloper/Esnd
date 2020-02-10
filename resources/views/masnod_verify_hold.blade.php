<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@extends('admin.layout')
@section('content')
    <div class="sub_container">
        <label> Masnod Verification Hold </label>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Masnod Name</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Messages</th>
            </tr>
            </thead>
            <tbody>
            @foreach($masnod_hold as $masnod_hold)
                <tr>
                    <td>{!! $masnod_hold->masnod->name !!}</td>
                    <td>{!! $masnod_hold->masnod->telephone !!}</td>
                    <td>{!! $masnod_hold->masnod->email !!}</td>
                    <td>
                        {!! Form::open() !!}
                        <div class='btn-group'>
                            <a href="{!! url('/message/'.$masnod_hold->hold)!!}">View Message</a>
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

