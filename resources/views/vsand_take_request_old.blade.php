@extends('layouts.app')

@section('content')
<nav class="navbar navbar-dark bg-dark navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Esnd
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                   <a class="nav-link" href="/vsand/dashboard">Dashboard <span class="sr-only"></span></a>
                </li>

            </ul>


            <ul class="navbar-nav ml-auto">

              @auth('vsand')
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::guard('vsand')->user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
              @else
              <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
              <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>

@endguest
            </ul>
        </div>
    </div>
</nav>
<link href="{{ asset('css/vmasnod_request.css') }}" rel="stylesheet">
<div class="brannd">
    <div class="masnod-dash text-center">
        <div class="container">
                <div class="forms">
            <div class="row">
                <div class="col-md-7 col-sm-8 col-xs-5">
                    <h1>Sand Profile</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <label>NAME</label>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <input type="text" class="form-control" placeholder="Name" readonly value="{{$sand->name}}">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <label>EMAIL</label>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <input type="text" class="form-control" placeholder="Email" readonly value="{{$sand->email}}">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <label>ADDRESS</label>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <input type="text" class="form-control" placeholder="Address" readonly  value="{{$sand->address}}">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <label>SOCIAL ID</label>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <input type="text" class="form-control" placeholder="Social id" readonly value="{{$sand->social_id}}">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <label>GOVERNORATE</label>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <input type="text" class="form-control" placeholder="Governorate" readonly value="{{$sand->governorate}}">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <label>TELEPHONE</label>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <input type="text" class="form-control" placeholder="Telephone" readonly value="{{$sand->telephone}}">
                </div>
            </div>
            <div class="col-md-12  ">
              @foreach($messages as $sand_message)
                {{$sand_message->message}} -  {{$sand_message->name}} -  {{$sand_message->created_at}} <br />
              @endforeach
            </div>

        <div class="col-lg-10">
          {!! Form::open(['action'=>['VsandController@r_message','id'=>$request->id],'method'=>'post']) !!}
          <!-- <form action="VmasnodController@message" method="post"> -->
            <div class="form-group">
              <label>leave a message</label>
              <input type="text" class="form-control" name="message" required>
              <input type="hidden" class="form-control" name="method" id="method">
            </div>
            <button class="btn btn-primary" onclick="hold()">HOLD</button>
            <button class="btn btn-primary" onclick="escalate()">ESCALATE</button>
          </form>
        </div>

        </div>
                <div class="forms">
            <div class="row">
                <div class="col-md-7 col-sm-8 col-xs-5">
                    <h1>Masnod Profile</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <label>NAME</label>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <input type="text" class="form-control" placeholder="Name" readonly value="{{$masnod->name}}">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <label>EMAIL</label>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <input type="text" class="form-control" placeholder="Email" readonly value="{{$masnod->email}}">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <label>ADDRESS</label>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <input type="text" class="form-control" placeholder="Address" readonly  value="{{$masnod->address}}">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <label>SOCIAL ID</label>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <input type="text" class="form-control" placeholder="Social id" readonly value="{{$masnod->social_id}}">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <label>GOVERNORATE</label>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <input type="text" class="form-control" placeholder="Governorate" readonly value="{{$masnod->governorate}}">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <label>TELEPHONE</label>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-2">
                    <input type="text" class="form-control" placeholder="Telephone" readonly value="{{$masnod->telephone}}">
                </div>
            </div>

        </div>

            <div class="masnod-request">
                <div class="row">
                    <div class="col-md-12 col-sm-8 col-xs-5">
                        <h2 class="h1">Masnod Request</h2>
                    </div>
                </div>
                <form action='/vsand/vsand_take_request?id={{$request->id}}' method="POST">@csrf
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-5">
                        <label for="description">DESCRIPTION</label>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-6">
                        <input id="description" type="text" class="form-control" placeholder="Description" readonly value="{{$request->request_description}}">
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-5">
                            <label>CATEGORY</label>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-6">
                        <input type="text" class="form-control" placeholder="Category" readonly value="{{$request->category}}">
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-5">
                        <label>MASNOD STATUS</label>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-6">
                        <input type="text" class="form-control" placeholder="Status" readonly value="{{$request->masnod_status}}">
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-5">
                        <label>Delivery date</label>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-6">
                        <input type="date" name="d_date" class="form-control" placeholder="Status" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-6">
                      <button type="submit" class="btn btn-primary">take this request</button>
                    </div>
                  </form>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <img class='image-fluid' src= "//esndco.com/public/attachments/{{$request->attachments}}" />
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
