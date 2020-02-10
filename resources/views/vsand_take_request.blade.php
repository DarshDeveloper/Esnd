
  @extends('layouts.app')
  <head>
      <title>vsand take request</title>
  </head>
  @section('content')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.12/css/mdb.min.css" rel="stylesheet">
    <link href="{{asset('css/style_dashboard.css')}}" rel="stylesheet">

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


<div class="contentcenter">

  <div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded ">
      <h2 class="text-center">Sand Profile</h2>

      <hr>

          <div class="form-group">
              <label>Name</label>
              <input class="form-control" type="text" value="{{$sand->name}}" readonly>
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <label>Email</label>
              <input class="form-control" type="text" value="{{$sand->email}}" readonly>
              <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label>Address</label>
            <input class="form-control" type="text" value="{{$sand->address}}" readonly>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Social Id</label>
            <input class="form-control" type="number" value="{{$sand->social_id}}" readonly>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Governorate</label>
            <input class="form-control" type="text" value="{{$sand->governorate}}" readonly>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Telephone</label>
            <input class="form-control" type="number" value="{{$sand->telephone}}" readonly>
            <span class="help-block"></span>
        </div>
        {{--<div class="col-md-12  ">--}}
          {{--@foreach($messages as $sand_message)--}}
            {{--{{$sand_message->message}} -  {{$sand_message->name}} -  {{$sand_message->created_at}} <br />--}}
          {{--@endforeach--}}
        {{--</div>--}}
      <div class="col-md-12  ">
            <textarea class="md-textarea form-control" style="white-space: pre-line;" rows="3" readonly>
                @foreach($messages as $sand_message)
                    {{$sand_message->message}} - {{$sand_message->name}} -  {{$sand_message->created_at}}
                @endforeach</textarea>
      </div>

        <div class="form-group">
          {!! Form::open(['action'=>['VsandController@r_message','id'=>$request->id],'method'=>'post']) !!}
            <label for="comment">Leave a Message</label>
            <input type="hidden" class="form-control" name="method" id="method">
            <textarea class="form-control" rows="5" id="comment" name="message" required></textarea>
          </div>
      <button class="btn btn-primary" onclick="hold()">HOLD</button>
      <button class="btn btn-primary" onclick="escalate()">ESCALATE</button>
          <hr>
      </form>
  </div>

  <div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded ">
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
          <input class="form-control" type="text" value="{{$masnod->address}}" readonly>
          <span class="help-block"></span>
      </div>
      <div class="form-group">
          <label>Social Id</label>
          <input class="form-control" type="number" value="{{$masnod->social_id}}" readonly>
          <span class="help-block"></span>
      </div>
      <div class="form-group">
          <label>Governorate</label>
          <input class="form-control" type="text" value="{{$masnod->governorate}}" readonly>
          <span class="help-block"></span>
      </div>
      <div class="form-group">
          <label>Telephone</label>
          <input class="form-control" type="number" value="{{$masnod->telephone}}" readonly>
          <span class="help-block"></span>
      </div>

        <hr>

</div>



  <div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded ">
    <h2 class="text-center">Masnod Request</h2>

    <hr>
    <form action='/vsand/vsand_take_request?id={{$request->id}}' method="POST">@csrf
        <div class="form-group">
            <label>Description</label>
            <input type="text" name="username" class="form-control" readonly value="{{$request->request_description}}">
            <span class="help-block"></span>
        </div>

        <div class="form-group">
            <label>Category</label>
            <input type="text" name="username" class="form-control" readonly value="{{$request->category}}">
        </div>
        @if($request->category=='monetary')
        <div class="form-group">
            <label>Money value</label>
            <input type="text" name="username" class="form-control" readonly value="{{$request->value}}">
        </div>
@endif
        <div class="form-group">
            <label>Masnod Status</label>
            <input type="text" name="username" class="form-control" readonly value="{{$request->masnod_status}}">
        </div>
      <div class="form-group">
          <label>Delivery Data</label>
          <input type="date" name="d_date" class="form-control" placeholder="Status" value="<?php echo date('Y-m-d'); ?>">
          <span class="help-block"></span>
      </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-dark rounded btn-lg btn-block" value="Login">Take This Request<i class="fa fa-pencil" aria-hidden="true"></i></button>
        </div>
        <hr>
        <div class="form-group row">
            <div class="col-md-6">
                <img class='image-fluid' src= "//esndco.com/public/attachments/{{$request->attachments}}" />
            </div>
        </div>
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
  @endsection
