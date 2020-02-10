
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>vmasnod edit request</title>
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
                    <a class="nav-link" href="/vmasnod/dashboard">Dashboard <span class="sr-only"></span></a>
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

<link href="{{ asset('css/vmasnod_request.css') }}" rel="stylesheet">
<div class="contentcenter">


    <div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded " id="app">
        <h2 class="text-center">Masnod Profile</h2>

        <hr>

            <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" value="{{$masnod->name}}" readonly>
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="text" value="{{$masnod->email}}" readonly>
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input class="form-control" type="text"  value="{{$masnod->address}}" readonly>
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Social Id</label>
                <input class="form-control" type="text" value="{{$masnod->social_id}}" readonly>
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
        <div class="col-md-12  ">
            <textarea class="md-textarea form-control" style="white-space: pre-line;" rows="3" readonly> @foreach($messages as $masnod_message)
                    {{$masnod_message->message}} - {{$masnod_message->name}} -  {{$masnod_message->created_at}}
                @endforeach</textarea>
        </div>
            <div class="text-center" style="margin-top: 25px;">
                {!! Form::open(['action'=>['VmasnodController@r_message','id'=>$request->id],'method'=>'post']) !!}
                <div class="form-group">
                    <label>leave a message</label>
                    <input type="hidden" class="form-control" name="method" id="method">
                    <input type="text" class="form-control" name="message" required>
                </div>
                <button class="btn btn-primary" onclick="hold()">HOLD</button>
                <button class="btn btn-primary" onclick="escalate()">ESCALATE</button>
               {!! Form::close() !!}
            </div>

            <hr>
    </div>

    <div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded ">
        <form method="POST" action="/vmasnod/approve?id={{$request->id}}">@csrf
        <h2 class="text-center">Masnod Request</h2>

        <hr>

            <div class="form-group">
                <label>Description</label>
                <input class="form-control" type="text"  value="{{$request->request_description}}" readonly>
                <span class="help-block"></span>
            </div>

            <div class="form-group">
                <label>Category</label>
                <input class="form-control" type="text" value="{{$request->category}}" readonly>
                <span class="help-block"></span>
            </div>
@if($request->category=='monetary')
            <div class="form-group">
                <label>Money Value</label>
                <input class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}" type="number" name="value" id="value"   required>
                @if ($errors->has('value'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('value') }}</strong></span>
                @endif
                <span class="help-block"></span>

            </div>
            <div class="form-group">
                <label>Confirm Money Value</label>
                <input type="number" name="c_value" id="c_value" class="form-control{{ $errors->has('c_value') ? ' is-invalid' : '' }}" value="{{$request->c_value}}" {{$request->category!='monetary'?'readonly':''}} required>
                @if ($errors->has('c_value'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('c_value') }}</strong></span>
                @endif
                <span class="help-block"></span>
            </div>
@endif
            <div class="form-group">
                <label>Masnod Status</label>
                <input class="form-control" type="text" value="{{$request->masnod_status}}" readonly>
                <span class="help-block"></span>
            </div>

            <div class="form-group">
                <label>Delivery Date</label>
                <input type="date" name="d_date" class="form-control" placeholder="Status" value="<?php echo date('Y-m-d'); ?>">
                <span class="help-block"></span>
            </div>
            <img src="//esndco.com/public/attachments/{{$request->attachments}}"  style="height: 200px; width:360px;">
            <hr>
            <div class="form-group mt-3">
                @if($request->category=='monetary')
                <button type="submit" class="btn btn-dark rounded btn-lg btn-block" onclick="check()">Approve This Request</button>
            @else
                    <button type="submit" class="btn btn-dark rounded btn-lg btn-block" >Approve This Request</button>
                @endif
            </div>
            <hr>
        </form>
    </div>

    <div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded ">
        <h2 class="text-center">Add Request</h2>

        <hr>
        <form action='/vmasnod/vmasnod_add_request?id={{$request->id}}' method="POST">@csrf
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description">
                <span class="help-block"></span>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select class="custom-select mr-sm-2 form-control" id="colorselector" name="category">
                    {{--<option selected >Choose...</option>--}}
                    <option value="monetary">Monetary</option>
                    <option value="materialistic">Materialistic</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div id="monetary" class="colors">
            <div class="form-group">
                <label>Money Value</label>
                <input class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}" type="number" name="value" id="value1"  >
                @if ($errors->has('value'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('value') }}</strong></span>
                @endif
                <span class="help-block"></span>

            </div>
            <div class="form-group">
                <label>Confirm Money Value</label>
                <input type="number" name="c_value" id="c_value1" class="form-control{{ $errors->has('c_value') ? ' is-invalid' : '' }}" value="{{$request->c_value}}" >
                @if ($errors->has('c_value'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('c_value') }}</strong></span>
                @endif
                <span class="help-block"></span>
            </div>
            </div>
            <div id="materialistic" class="colors" style="display:none">  </div>
            <div id="other" class="colors" style="display:none">  </div>
            <div class="form-group">
                <label>Masnod Status</label>
                <select class="custom-select mr-sm-2 form-control" id="inlineFormCustomSelect" name="masnod_status">
                    <option selected>Choose...</option>
                    <option value="Sick">Sick</option>
                    <option value="Old">Old</option>
                    <option value="Widow">Widow</option>
                    <option value="Devorce">Devorce</option>
                </select>
            </div>
            <div class="form-group">
                <label>Delivery Date</label>
                <input type="date" name="d_date" class="form-control" placeholder="Status" value="<?php echo date('Y-m-d'); ?>">
                <span class="help-block"></span>
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-dark rounded btn-lg btn-block" onclick="check1()" >Take This Request</button>
            </div>
            <hr>
        </form>
    </div>




    <div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded ">
        <table class="table table-responsive-sm">
            <h2 class="text-center">Masnod Requests</h2>

            <hr>
            <thead>
            <tr>
                <th scope="col">Request Description</th>
                <th scope="col">Category</th>
                <th scope="col">Masnod Status</th>
                <th scope="col">Request Status</th>
                <th scope="col">Delivery Date</th>
            </tr>
            </thead>
            <tbody>

            @if(isset($mrequests))
                @foreach($mrequests as $request)
                    <tr>
                        <td>
                            {{$request->request_description}}
                        </td>
                        <td>
                            {{$request->category}}
                        </td>

                        <td>
                            {{$request->masnod_status}}
                        </td>
                        <td>
                            {{$request->request_status}}
                        </td>

                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
        <hr>

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

<script>
    $(function() {
        $('#colorselector').change(function(){
            $('.colors').hide();
            $('#' + $(this).val()).show();
        });
    });
</script>

<script>
    function check() {
        var val = document.getElementById("value").value;
        var cval = document.getElementById("c_value").value;
        if (val != cval) {
            alert("Please Check Your Money Value Confirmation");
        }
            if(val <= 0 || cval <= 0)
            {
                alert("Please Check Your Money Value Must Be Positive");
            }
    }
</script>
<script>
    function check1() {
        var val = document.getElementById("value1").value;
        var cval = document.getElementById("c_value1").value;
        if (val != cval) {
            alert("Please Check Your Money Value Confirmation");
        }
        if(val <= 0 || cval <= 0)
        {
            alert("Please Check Your Money Value Must Be Positive");
        }
    }
    </script>
</body>

</html>
@endsection