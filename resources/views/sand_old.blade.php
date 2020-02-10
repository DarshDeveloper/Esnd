<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sand.css') }}" rel="stylesheet">
</head>
    <body>
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
      <div class="brannd">
          <div class="vmasnod-dash text-center">
              <div class="container">
                  <div class="tap">
                  <div class="row">
                      <div class="col-lg-12 col-sm-8 col-xs-5">
                          <h1 class="h1">masnod request</h1>

                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-12 col-md-11 col-sm-8 col-xs-8">
                          <table class="table">
                              <thead>
                                  <tr>
                                  <th>Request Description</th>
                                  <th>Category</th>
                                  <th>Masnod Status</th>
                                  <th></th>
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
                      </div>
                  </div>
                  </div>

                  <div class="row">
                      <div class="col-lg-12 col-sm-8 col-xs-5">
                          <h1 class="h1">My picked requests</h1>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-12 col-md-11 col-sm-8 col-xs-8">
                          <table class="table">
                              <thead>
                                  <tr>
                                  <th>Request description</th>
                                  <th>Category</th>
                                  <th>Masnod status</th>
                                  <th>Request status</th>
                                  <th>Delivery date</th>
                                  <th></th>
                                  <th></th>
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
                                          echo 'sand picked you';
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
                      </div>
                  </div>
              </div>
          </div>
      </div>


    </body>
</html>
