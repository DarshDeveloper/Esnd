
@extends('layouts.app')
        <head>
            <title>vsand edit request</title>
        </head>
@section('content')
        <!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>vsand edit request</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.12/css/mdb.min.css" rel="stylesheet">
    <link href="css/style_dashboard.css" rel="stylesheet">
</head>

<body class="grey lighten-5">
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

<link href="{{ asset('css/Vsand-edit-request.css') }}" rel="stylesheet">
<div class="contentcenter">


    <div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded " id="app">
        <h2 class="text-center">Sand</h2>

        <hr>

        <div class="form-group">
            <label>Name</label>
            <input type="text" readonly value="{{$sand->name}}" class="form-control" placeholder="Name">
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" readonly value="{{$sand->email}}" class="form-control" placeholder="Email">
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" readonly value="{{$sand->address}}" class="form-control" placeholder="Address">
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Social Id</label>
            <input type="text" readonly value="{{$sand->social_id}}" class="form-control" placeholder="Social id">
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Governorate</label>
            <input type="text" readonly value="{{$sand->governorate}}" class="form-control" placeholder="Governorate">
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Telephone</label>
            <input type="text" readonly value="{{$sand->telephone}}" class="form-control" placeholder="Telephone">
            <span class="help-block"></span>
        </div>
        <hr>

        <hr>
    </div>

    <div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded ">
            <h2 class="text-center">Masnod Request</h2>

            <hr>
            {!! Form::open(['action'=>['VsandController@recieve','id'=>$request->id],'method'=>'post']) !!}@csrf
            <div class="form-group">
                <label>Description</label>
                <input type="text" readonly  value="{{$request->request_description}}" class="form-control" placeholder="Description">
                <span class="help-block"></span>
            </div>

            <div class="form-group">
                <label>Category</label>
                <input type="text" readonly  value="{{$request->category}}" class="form-control" placeholder="Category">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Masnod Status</label>
                <input type="text" readonly  value="{{$request->masnod_status}}" class="form-control" placeholder="Status">
                <span class="help-block"></span>
            </div>

            <div class="form-group">
                <label>Delivery Date</label>
                <input type="text" readonly  value="{{$request->delivery_date}}" class="form-control" placeholder="Status">
                <span class="help-block"></span>
            </div>
        <div class="col-md-6 col-sm-5 col-xs-2">
            <img src="//esndco.com/public/attachments/{{$request->attachments}}">
        </div>
           <br>
        <div style="padding-left: 250px">
            @if($sand->pocket<0)
                عليه {{-$sand->pocket}} جنيه
            @else
                ليه {{$sand->pocket}} جنيه
            @endif
        </div>
            <br />
        <div style="padding-left: 250px">
            @if(App\Payment::where('sand',$sand->id)->where('request',$request->id)->first()->in_charge==0)
                Free Request
            @else
                @if($request->category=='monetary')
                    {{App\Payment::where('sand',$sand->id)->where('request',$request->id)->first()->total_money}} EGP charge
                @else
                    Transportation Cost
                @endif
            @endif
        </div>
        <br>
            <div style="padding-left: 125px">
                <label>money recieved</label>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-6">
                <input type="number" class="form-control" name="recieved" required/>
                @if ($errors->has('recieved'))
                    <span class="text-danger" role="alert">
                                  <strong>{{ $errors->first('recieved') }}</strong>
                              </span>
                @endif
            </div>

            <div style="padding-left: 120px">
                <button type="submit" class="btn btn-primary">recieved</button>
            </div>
            <hr>
        {!! Form::close() !!}
    </div>


</div>

<!-- JQuery -->
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.12/js/mdb.min.js"></script>



</body>

</html>
@endsection