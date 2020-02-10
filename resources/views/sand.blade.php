<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sand Dashboard</title>
   	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.12/css/mdb.min.css" rel="stylesheet">
    <link href="{{asset('css/sand_dash.css')}}" rel="stylesheet">
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
        <table class="table table-responsive-sm">
            <h2 class="text-center">Masnod Request</h2>

            <hr>
            <thead>
                <tr>
                <th scope="col">Request Description</th>
                <th scope="col">Category</th>
                <th scope="col">Masnod Status</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @if(isset($requests))
              @foreach($requests as $request)
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
                    <a href='sand_take_request/{{$request->id}}'>view</a>
                  </td>
                </tr>
              @endforeach
              @endif
            </tbody>
            </table>
        <hr>

    </div>



<div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded ">
    <table class="table table-responsive-sm">
        <h2 class="text-center">My Picked Requests</h2>
        <?php
        if(isset($link)){
        echo "<a href=/sand/report> View All </a>";
        }
        else{
        echo '';
        }
        ?>
        <hr>
        <thead>
          <tr>
            <th scope="col">Request Description</th>
            <th scope="col">Category</th>
            <th scope="col">Masnod Status</th>
            <th scope="col">Request Status</th>
            <th scope="col">Delivery Date</th>
            <th></th>
            {{--<th scope="col">View All</th>--}}
          </tr>
        </thead>
        <tbody>
        @if(isset($srequests))
          @foreach($srequests as $request)
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
                    echo 'wait vsand to pick';
                  elseif($request->request_status == 'vs')
                    echo 'the request with vsand';
                  elseif($request->request_status == 'd')
                    echo 'vmasnod delivered it';
                ?>
              </td>
              <td>
                {{$request->delivery_date}}
              </td>
              <td>
                @if($request->request_status == 's')
                  <a href='delete_sand_request/{{$request->id}}'>delete</a>
                @endif
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
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.12/js/mdb.min.js"></script>
    <script src="{{asset('js/custom_sand.js')}}"></script>
</body>
</html>
