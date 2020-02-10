@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Masnod Profile</title>
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

                </li>

            </ul>


            <ul class="navbar-nav ml-auto">

                @auth('vmasnod')
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('vmasnod')->user()->name }} <span class="caret"></span>
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

<link href="{{ asset('css/masnod.css') }}" rel="stylesheet">
<div class="contentcenter">


    <div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded " id="app">
        <h2 class="text-center">Masnod Information</h2>

        <hr>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text"  readonly name="name" value="{{$masnod->name}}">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="text" name="email" value="{{$masnod->email}}" readonly>
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input class="form-control" type="text" name="address" value="{{$masnod->address}}" readonly>
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Social Id</label>
                <input class="form-control" type="text" name="social_id" value="{{$masnod->social_id}}" readonly>
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Governorate</label>
                <input class="form-control" type="text" value="{{$masnod->governorate}}" readonly>
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Telephone</label>
                <input class="form-control" type="text" value="{{$masnod->telephone}}" readonly>
                <span class="help-block"></span>
            </div>
            <img src="//esndco.com/public/attachments/{{$masnod->social_id_front_photo}}"  style="height: 200px; width:360px;">
            <img src="//esndco.com/public/attachments/{{$masnod->social_id_back_photo}}"  style="height: 200px; width:360px;">
            <hr>
           <div class="col-lg-10">
               {!! Form::open(['action'=>['VmasnodController@message','masnod'=>$masnod->id,'vmasnod'=>session('vmasnod')],'method'=>'post']) !!}

               <textarea class="md-textarea form-control" style="white-space: pre-line;" rows="3" readonly> @foreach($messages as $masnod_message)
                       {{$masnod_message->message}} - {{$masnod_message->name}} -  {{$masnod_message->created_at}}
                   @endforeach</textarea>

            <div class="text-center" style="margin-top: 25px;">
                <span style="border:2px solid rgb(99, 99, 99); border-radius:10px; padding:5px;">Leave a Message</span>
            </div>
               <br> <br>
               <input type="hidden" class="form-control" name="method" id="method">
            <input type="text" class="form-control" name="message" required>



            <div class="form-group mt-3 text-center">
                <button type="submit" class="btn btn-dark rounded"><a href="/vmasnod/masnod_verify/{{$masnod->id}}" style="color: white" >Verify</a></button>
                <button type="submit" class="btn btn-dark rounded" onclick="hold()" >Hold</button>
                <button type="submit" class="btn btn-dark rounded" onclick="escalate()" >Escalate</button>
            </div>
               {!! Form::close() !!}
           </div>
            <hr>

    </div>



</div>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.12/js/mdb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    new Vue({
        el:'#app',
        data:{
            message:'',
        }
    })

</script>
</body>
</html>
@endsection