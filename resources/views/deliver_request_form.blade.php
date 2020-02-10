<head>
    <title>
        Vmasnod Deliver Request
    </title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.12/css/mdb.min.css" rel="stylesheet">
  <link href="css/style_dashboard.css" rel="stylesheet">

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


<div class="contentcenter">

  <div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded ">
      <h2 class="text-center">Masnod</h2>

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

      <div class="col-md-12  ">
            <textarea class="md-textarea form-control" style="white-space: pre-line;" rows="3" readonly> @foreach($messages as $masnod_message)
                    {{$masnod_message->message}} - {{$masnod_message->name}} -  {{$masnod_message->created_at}}
                @endforeach</textarea>
      </div>

        {!! Form::open(['action'=>['VmasnodController@r_message','id'=>$request->id],'method'=>'post']) !!}

        <div class="form-group">
            <label for="comment">Leave a Message</label>
            <input type="hidden" class="form-control" name="method" id="method">
            <textarea class="form-control" rows="2" id="comment" name="message" required></textarea>
          </div>
      <button class="btn btn-primary" onclick="hold()">HOLD</button>
      <button class="btn btn-primary" onclick="escalate()">ESCALATE</button>
          <hr>
      </form>
  </div>




  <div class="container pt-4 mt-4 wrapper blue-grey lighten-5 z-depth-5 rounded ">
    <h2 class="text-center">Masnod Request</h2>
    @if($request->vmasnod_2)
      <form action='/vmasnod/vmasnod_delivered?id={{$request->id}}' method="POST" enctype="multipart/form-data">
    @else
      <form action='/vmasnod/vmasnod2_take_request?id={{$request->id}}' method="POST">
    @endif

    <hr>
        <div class="form-group">
            <label>Description</label>
            <input type="text" name="username" class="form-control"  value="{{$request->request_description}}" readonly>
            <span class="help-block"></span>
        </div>
        @csrf
        <div class="form-group">
            <label>Category</label>
            <input type="text" name="username" class="form-control"  value="{{$request->category}}" readonly>
        </div>

        <div class="form-group">
            <label>Masnod Status</label>
            <input type="text" name="username" class="form-control"  value="{{$request->masnod_status}}" readonly>
        </div>
      <div class="form-group">
          <label>Delivery Data</label>
          @if($request->vmasnod_2)
            <input id="category" type="date" class="form-control " readonly  name="d_date"    value="{{$request->delivery_date}}">
          @else
            <input id="category" type="date" class="form-control "   name="d_date"    value="{{$request->delivery_date}}">
          @endif
          <span class="help-block"></span>
      </div>


      <div class="form-group row">
          <div class="col-md-6">
            @if($request->vmasnod_2)
              @if(App\Payment::where('sand',$request->sand_id)->where('request',$request->id)->first()->in_charge==1 && $request->category != 'monetary')
                <div class="form-group row">
                  <label for="cost" class="col-md-5 col-form-label text-md-right">Transportation Cost</label>
                  <div class="col-md-5 col-sm-5 col-xs-2" for="cost">
                      <input id="cost" type="number" class="form-control " name="cost" required>
                  </div>
                </div>
                @endif

              <button type="submit" class="btn btn-danger">delivered</button>
            @else
              <button type="submit" class="btn btn-danger">Take this request</button>
              @endif
          </div>
      </div>
      @if($request->vmasnod_2)
      <div class="form-group row">
        <label for="attachment" class="col-md-4 col-form-label text-md-right">attachment</label>
        <div class="col-md-5 col-sm-5 col-xs-2" for="attachment">
            <input id="attachment" type="file" class="form-control " name="attachment" multiple>
            @if ($errors->has('attachment'))
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->first('attachment') }}</strong>
                </span>
            @endif
        </div>
      </div>
      <div class="form-group row">
          <div class="col-md-6">

              <img class='image-fluid' src= "//esndco.com/public/attachments/{{$request->attachments}}" style="height: 200px; width:360px;"/>

          </div>
      </div>
      @endif
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
