<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sand Take Request</title>
   	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.12/css/mdb.min.css" rel="stylesheet">
    <link href="{{asset('css/sand_take.css')}}" rel="stylesheet">
</head>
<body class="grey lighten-5">

        <nav class="navbar navbar-dark bg-dark navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                <a class="navbar-brand" href="#"><img class="logo" src="{{asset('images/3.png')}}"></a>
                    </li>
                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/sand/dashboard">Dashboard <span class="sr-only"></span></a>
                        </li>

                    </ul>


                    <ul class="navbar-nav ml-auto">

                        @auth('sand')
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('sand')->user()->name }} <span class="caret"></span>
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
      <h2 class="text-center">Masnod Profile</h2>

      <hr>
      <form action="login.php" method="post">
          <div class="form-group">
              <label>Name</label>
              <input class="form-control" type="text" placeholder="Readonly input here…" readonly value="{{$masnod->name}}">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <label>Governorate</label>
              <input class="form-control" type="text" placeholder="Readonly input here…" readonly value="{{$masnod->governorate}}">
              <span class="help-block"></span>
          </div>

          <hr>
      </form>
  </div>




  @foreach($requests as $request)
  <?php
  $sand = App\Sand::find(session('sand'))->charge;
  $fee = App\Masnods_help::where('sand_id',session('sand'))->get();
  if($fee->count()>2||($request->value&&$fee->pluck('value')->sum()+$request->value>500)||(!$request->value&&$fee->pluck('value')->sum()+$request->value>=500))
  if($request->category=='monetary')
  $request->fee=$request->value/100*$sand;
  else
  $request->fee='value';
   ?>
  <form action='/sand/confirm_request?id={{$request->id}}' method="POST">@csrf
  <div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded ">
    <h2 class="text-center">Masnod Request</h2>

    <hr>

        <div class="form-group">
            <label>Description</label>
            <input class="form-control" type="text" placeholder="Readonly input here…" readonly  value="{{$request->request_description}}"><input type="hidden" name="value" value="{{$request->fee}}"/>
            <span class="help-block"></span>
        </div>

        <div class="form-group">
            <label>Category</label>
            <input class="form-control" type="text" placeholder="Readonly input here…" readonly value="{{$request->category}}">
            <span class="help-block"></span>
        </div>

        <div class="form-group">
            <label>Masnod Status</label>
            <input class="form-control" type="text" placeholder="Readonly input here…" readonly  value="{{$request->masnod_status}}">
            <span class="help-block"></span>
        </div>



        <div class="form-group mt-3">
            <button type="submit" class="btn btn-dark rounded btn-lg btn-block" value="Login">Esnd This Request
              @if($request->fee)
                  @if((int)$request->fee)
                      <span style="color:red">+ {{(int)$request->fee}} EGP CHARGE</span>
                  @else
                    <span style="color:red">+ transportation </span>
                  @endif
              @else
                free
              @endif
              <i class="fa fa-pencil" aria-hidden="true"></i></button>
        </div>
        <hr>
        <div class="col-md-6 col-sm-8 col-xs-5">
            <img src="//esndco.com/public/attachments/{{$request->attachments}}" style="height: 200px; width:360px;">
        </div>

</div>
</form>
  @endForeach


</div>

    <!-- JQuery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.12/js/mdb.min.js"></script>

</body>
</html>
