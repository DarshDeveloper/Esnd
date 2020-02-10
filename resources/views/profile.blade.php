@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{--<div class="col-sm-12">--}}
                {{--<img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">--}}
                {{--<h2>{{ $user->name }}'s Profile</h2>--}}
                {{--<form enctype="multipart/form-data" action="/profile" method="POST">--}}
                    {{--<label>Update Profile Image</label>--}}
                    {{--<div class="col-sm-12"></div>--}}
                    {{--<input type="file" name="avatar">--}}
                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                    {{--<div class="col-sm-12"></div>--}}
                    {{--<input type="submit" class="pull-right btn btn-sm btn-primary">--}}
                {{--</form>--}}
            {{--</div>--}}
            <div class="col-sm-12">
                <img src="/uploads/socialidfront/{{ $user->social_id_front_photo }}" style="width:150px; height:150px; float:left; margin-right:25px;">
                <form enctype="multipart/form-data" action="/profile" method="POST">
                    <label>Update Social id front Image</label>
                    <div class="col-sm-12"></div>
                    <input type="file" name="social_id_front_photo">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-sm-12"></div>
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>
            <div class="col-sm-12">
                <img src="/uploads/socialidback/{{ $user->social_id_back_photo }}" style="width:150px; height:150px; float:left; margin-right:25px;">
                <form enctype="multipart/form-data" action="/profile" method="POST">
                    <label>Update Social id back Image</label>
                    <div class="col-sm-12"></div>
                    <input type="file" name="social_id_back_photo">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-sm-12"></div>
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
