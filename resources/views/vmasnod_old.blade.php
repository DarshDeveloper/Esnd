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

@endauth
            </ul>
        </div>
    </div>
</nav>

    <link href="{{ asset('css/vmasnod.css') }}" rel="stylesheet">
    <div class="brannd">
        <div class="masnod-dash text-center">
            <div class="container">
                <div class="forms">

                    <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-4">
                                <div id="mytabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">Vmasnod Dashboard</a></li>
                                    <li><a data-toggle="tab"  href="#about">Masnod verification</a></li>
                                </ul>
                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active">
                                            <div class="row">
                                                <div class="col-md-5 col-sm-8 col-xs-5">
                                                    <h1 class="top">Vlidated MASNOD Requests</h1>
                                                </div>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th>Request Description</th>
                                                    <th>Category</th>
                                                    <th>Masnod Status</th>

                                                    <th>Request Status</th>
                                                    <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if(isset($requests))
                                                  @foreach($requests as $request)
                                                    <tr>
                                                      <td>
                                                        {{$request['request_description']}}
                                                      </td>
                                                      <td>
                                                        {{$request['category']}}
                                                      </td>

                                                      <td>
                                                        {{$request['masnod_status']}}
                                                      </td>

                                                      <td>
                                                        {{$request['request_status']}}
                                                      </td>
                                                      <td>
                                                        <a href='vmasnod_edit_request/{{$request['id']}}'>view</a>
                                                      </td>
                                                    </tr>
                                                  @endforeach
                                                  @endif
                                                </tbody>
                                        </table>

                                        <div class="row">
                                                <div class="col-md-5 col-sm-8 col-xs-5">
                                                    <h2  class="h1">My Requests</h1>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-4">
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
                                                            @if($request->escalate)
                                                            @else
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
                                                                @if($request->request_status == 'vm2')
                                                                  <a href='vmasnod_deliver_request/{{$request->id}}'>View</a>
                                                                @endif
                                                              </td>
                                                            </tr>
                                                            @endif
                                                          @endforeach
                                                          @endif
                                                        </tbody>                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5 col-sm-8 col-xs-5">
                                                    <h2  class="h1">from vsand Request</h1>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-4">
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
                                                        @if(isset($vsrequests))
                                                          @foreach($vsrequests as $request)
                                                          @if($request->escalate)
                                                          @else
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
                                                                <a href='vmasnod_deliver_request/{{$request->id}}'>View</a>
                                                              </td>
                                                            </tr>
                                                            @endif
                                                          @endforeach
                                                          @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                </div>
                                <div id="about" class="tab-pane fade">

                                    <table class="table">
                                            <thead>
                                                <tr>
                                                <th>NAME</th>
                                                <th>EMAIL</th>
                                                <th>telephone</th>
                                                <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($masnods))
                                              @foreach($masnods as $masnod)
                                                <tr>
                                                  <td>
                                                    {{$masnod['name']}}
                                                  </td>
                                                  <td>
                                                    {{$masnod['email']}}
                                                  </td>
                                                  <td>
                                                    {{$masnod['telephone']}}
                                                  </td>
                                                  <td>
                                                    <a href='masnod_profile/{{$masnod['id']}}'>View</a>
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
                </div>
            </div>
        </div>
    </div>
@endsection
