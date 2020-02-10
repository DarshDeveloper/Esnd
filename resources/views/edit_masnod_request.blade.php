<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
   <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Masnod Request</title>
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
                    <a class="nav-link" href="/masnod/dashboard">Dashboard <span class="sr-only"></span></a>
                </li>

            </ul>


            <ul class="navbar-nav ml-auto">

                @auth('masnod')
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('masnod')->user()->name }} <span class="caret"></span>
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

    
<div class="contentcenter">




  <div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded ">
    <h2 class="text-center">Masnod Request</h2>
    
    <hr>
    <form action='/masnod/update_masnod_request?id={{$request->id}}' method="POST"  enctype='multipart/form-data'>@csrf
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control"id="description" placeholder="Description" name="description"  value="{{$request->request_description}}">
            <span class="help-block"></span>
        </div>
        
        <div class="form-group">
            <label>Category</label>
            <select class="custom-select mr-sm-2 form-control" id="category" type="text"  name="category"    value="{{$request->category}}">
                <option selected>@if(isset($request)){{$request->category}} @else Choose...@endif</option>
                <option value="monetary">Monetary</option>
                <option value="materialistic">Materialistic</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label>Masnod Status</label>
            <select class="custom-select mr-sm-2 form-control" id="masnod_status" type="text"  name="masnod_status"    value="{{$request->masnod_status}}">
                <option selected>@if(isset($request)){{$request->masnod_status}} @else Choose...@endif</option>
                <option value="Sick">Sick</option>
                <option value="Old">Old</option>
                <option value="Widow">Widow</option>
                <option value="Devorce">Divorce</option>
            </select>
        </div>
      <div class="form-group">
          <label>Delivery Date</label>
          <input type="date" name="request_date" class="form-control" value="{{$request->request_date}}">
          <span class="help-block"></span>
      </div>
      <div class="form-group" for="attachment">
            <label>Attachment</label>
            <input id="attachment" type="file" name="attachment" class="form-control">
            <span class="help-block"></span>
        </div>
      
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-dark rounded btn-lg btn-block" value="Login">Send Request <i class="fa fa-share-square-o" aria-hidden="true"></i></button>
        </div>
         <div class="form-group mt-3">
              
              <img  src= "//esndco.com/public/attachments/{{$request->attachments}}" style="width:150px; height:150px;"/>
        </div>
        <hr>
    </form>
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
    <script src="js/custom.js"></script>
</body>
</html>