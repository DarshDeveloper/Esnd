@extends('layouts.app')

@section('content')
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

    <link href="{{ asset('css/sand_take_request.css') }}" rel="stylesheet">

    <div class="brannd">
        <div class="masnod-dash text-center">
            <div class="container">
              <div class="masnod-request">

          <div class="row">
              <div class="col-md-7 col-sm-8 col-xs-5">
                  <h1>Masnod Profile</h1>
              </div>
          </div>

          <div class="row">
              <div class="col-md-5 col-sm-5 col-xs-2">
                  <label>NAME</label>
              </div>
              <div class="col-md-5 col-sm-5 col-xs-2">
                  <input type="text" class="form-control" placeholder="Name" readonly value="{{$masnod->name}}">
              </div>


              <div class="col-md-5 col-sm-5 col-xs-2">
                  <label>GOVERNORATE</label>
              </div>


          </div>
          </div>


              @foreach($requests as $request)
              <form action='/sand/confirm_request?id={{$request->id}}' method="POST">@csrf
                <div class="masnod-request">
                    <div class="row">
                        <div class="col-md-12 col-sm-8 col-xs-5">
                            <h2 class="h1">masnod request</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-5">
                            <label>DESCRIPTION</label>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <input type="text"  class="form-control" placeholder="Description"  value="{{$request->request_description}}" readonly>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2">
                                <label>CATEGORY</label>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <input type="text" class="form-control" placeholder="Category"   value="{{$request->category}}" readonly>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <label>Masnod status</label>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <input type="text" class="form-control"  value="{{$request->masnod_status}}" readonly>
                        </div>

                    </div>
                    <button type="submit" class="btn-sand">Esnd this REQUEST</button>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-8 col-xs-5">
                            <img src="//esndco.com/public/attachments/{{$request->attachments}}">
                        </div>
                    </div>

                </div>
              </form>
              @endForeach
            </div>
        </div>
    </div>


@endsection
