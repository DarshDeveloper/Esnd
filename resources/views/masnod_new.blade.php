<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Masnod dashboard</title>
   	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.12/css/mdb.min.css" rel="stylesheet">
    <link href="{{asset('css/style_dashboard.css')}}" rel="stylesheet">
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
      <h2 class="text-center">My Information</h2>

      <hr>

          <div class="form-group">
              <label>Name</label>
              <input type="text" name="username" class="form-control"  value="{{$masnod->name}}">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <label>Email</label>
              <input type="text" name="text" class="form-control" value="{{$masnod->email}}">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" name="text" class="form-control" value="{{$masnod->address}}">
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Social Id</label>
            <input type="text" name="text" class="form-control"  value="{{$masnod->social_id}}">
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Governorate</label>
            <input type="text" name="text" class="form-control"  value="{{$masnod->governorate}}">
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Telephone</label>
            <input type="text" name="text" class="form-control"  value="{{$masnod->telephone}}">
            <span class="help-block"></span>
        </div>
      <div>
      <form action='masnod_social_id' method="POST" enctype='multipart/form-data'>@csrf
          @if(!$masnod->social_id_front_photo || !$masnod->social_id_back_photo)
              <h2 style="color: red">you cannot send request before uploading photos</h2>
          @endif

          @if(!$masnod->valid)
              <div>
               <h4>  Front Social ID </h4>
                  <input type="file" name="front" class="img_btn col-md-5" >
              </div>
          <br>
          <div>
             <h4> Back Social ID </h4>
              <input type="file" name="back" class="img_btn col-md-5" >
          </div>
          <br>
              <button type="submit" class="btn btn-success">Upload Social id</button>
          @endif
      </form>
      </div>
        <div class="form-group mt-3">
              <img src="//esndco.com/public/attachments/{{$masnod->social_id_front_photo}}"  style="width:200px; height: 130px; margin: 2px;">
            <img src="//esndco.com/public/attachments/{{$masnod->social_id_back_photo}}"  style="width:200px; height: 130px; margin: 2px;">
        </div>



          <div class="form-group mt-3">
            <button type="button" class="btn btn-dark rounded" value="Login"><a href="edit_masnod">EDIT<i class="fa fa-pencil" aria-hidden="true"></i></a></button>
        </div>
          <hr>

  </div>



  <div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded ">
    <h2 class="text-center">Add Request</h2>

    <hr>
    @if($masnod->social_id_back_photo && $masnod->social_id_front_photo)
    <form action='add_masnod_request' method="POST" enctype='multipart/form-data'>@csrf
        <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" class="form-control" value="">
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="custom-select mr-sm-2 form-control" id="inlineFormCustomSelect" name="category">
                <option value="monetary">Monetary</option>
                <option value="materialistic">Materialistic</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
          <label>Attachment</label>
          <input type="file" name="attachment" class="form-control" multiple>
          <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Masnod Status</label>
            <select class="custom-select mr-sm-2 form-control" id="inlineFormCustomSelect" name="status">
                <option value="Sick">Sick</option>
                <option value="Old">Old</option>
                <option value="Widow">Widow</option>
                <option value="Devorce">Devorce</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-dark rounded btn-lg btn-block" value="Login">Send Request<i class="fa fa-pencil" aria-hidden="true"></i></button>
        </div>
        <hr>
    </form>
              @endif
</div>



<div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded ">
    <table class="table table-responsive-sm">
        <thead>
          <tr>
            <th scope="col">Request Description</th>
            <th scope="col">Category</th>

            <th scope="col">Masnod Status</th>
            <th scope="col">Request Status</th>
          <th>Delivery date</th>
            <th scope="col"></th>
          </tr>
        </thead>
        @if($masnod_request)
        <tbody>
          @foreach($masnod_request as $request)
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
              <?php
               if($request->request_status == 'm')
                  echo 'wait vmasnod to pick';
                elseif($request->request_status == 'vm')
                  echo 'vmasnod picked you';
                elseif($request->request_status == 's')
                  echo 'sand picked you';
                elseif($request->request_status == 'vs')
                  echo 'the request with vsand';
                elseif($request->request_status == 'd')
                  echo 'vmasnod delivered it';
              ?>
            </td>
            <td>
              {{$request->request_date}}
            </td>
            <td>
              @if($request->request_status == 'm')
              <a href='edit_masnod_request/{{$request->id}}' class="btn btn-black btn-sm a-btn-slide-text" style="border-radius:10px; margin:20p; ">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                <a href='delete_masnod_request/{{$request->id}}' class="btn btn-black btn-sm a-btn-slide-text" style="border-radius:10px;">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>
              @endif
            </td>
          </tr>
          @endForeach
        </tbody>
        @endif
      </table>
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
    <script src="js/custom.js"></script>
</body>
</html>
