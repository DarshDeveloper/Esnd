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

    <link href="{{ asset('css/sand.css') }}" rel="stylesheet">

    <div class="brannd">
        <div class="vmasnod-dash text-center">
            <div class="container">
                <div class="tap">
                <div class="row">
                    <div class="col-lg-12 col-sm-8 col-xs-5">
                        <h1 class="h1">sand request</h1>

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
                                <th>Delivery Date</th>
                                <th>request_status</th>
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
                                    {{$request->delivery_date}}
                                  </td>
                                  <td>
                                      {{$request->request_status}}
                                  </td>

                                  <td>
                                    <a href='vsand_take_request/{{$request->id}}'>view</a>
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
                        <h1 class="h1">my requests</h1>
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
                            <th>Delivery Date</th>
		                        <th>Request Status</th>
		                        <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(isset($vrequests))
                              @foreach($vrequests as $request)
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
                                    {{$request->delivery_date}}
                                  </td>
                                  <td>
                                    {{$request->request_status}}
                                  </td>
<td>
                                  <a href='vsand_edit_request/{{$request->id}}'>view</a>
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
@endsection
