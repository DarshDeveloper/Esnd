<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@extends('admin.layout')
@section('content')
    <div class="sub_container">
        <label> Masnod Hold Messages </label>
        <table class="table table-bordered">
            <thead>
            <tr>
                {{--<th>Vmasnod Name</th>--}}
                <th>Masnod Name</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Messages</th>
            </tr>
            </thead>
            <tbody>
{{--            @foreach($masnod_hold as $masnod_hold)--}}

                <tr>
                    {!! Form::open(['route'=>['masnod_verify_message','id'=>$masnod_hold->hold],'method'=>'get']) !!}
                    {{--<td>{!! $masnod_hold->name !!}</td>--}}
                    <td>{!! $masnod_hold->name !!}</td>
                    <td>{!! $masnod_hold->telephone !!}</td>
                    <td>{!! $masnod_hold->email !!}</td>
                    <td>{!! $masnod_hold->message !!}</td>
                    {!! Form::close() !!}
                </tr>

            {{--@endforeach--}}
            </tbody>
        </table>
    </div>
@endsection

