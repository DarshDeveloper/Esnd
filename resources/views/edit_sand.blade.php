
  @extends('layouts.app')

  @section('content')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.12/css/mdb.min.css" rel="stylesheet">
    <link href="{{asset('css/style_dashboard.css')}}" rel="stylesheet">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img class="logo" src="{{asset('images/3.png')}}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

          <div class="navbar-nav ml-auto"></div>
          <li class="dropdown">
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
    </div>
        </div>
      </nav>


<div class="contentcenter">

  <div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded ">
    <form action='/vsand/edit_sand?id={{$sand->id}}' method="POST">@csrf

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
        <div class="col-md-12  ">

        </div>

        <div class="form-group">
          {!! Form::open(['action'=>['VsandController@edit_sand','id'=>$sand->id],'method'=>'post']) !!}




              <label>percentage</label>
              <input class="form-control" type="number" value="{{$sand->charge}}" name="per">

          </div>
          <div class="form-group mt-3">
            <button class="btn btn-dark rounded" type="submit">submit</button>
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
  @endsection
