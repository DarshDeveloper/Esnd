
@extends('layouts.app')

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



      <div id="mytabs">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a data-toggle="tab" role="tab" class="nav-link active" href="#home">Vmasnod Dashboard</a></li>
            <li class="nav-item"><a data-toggle="tab" role="tab" class="nav-link" href="#about">Masnod verification</a></li>
        </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade show active" id="#home" role="tabpanel" aria-labelledby="nav-home-tab">


                      <table class="table table-responsive-sm">
                            <br>
                            <h2 class="text-center">validated masnod Request</h2>
                        <thead>
                          <tr>
                            <th scope="col">Request Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Masnod Status</th>
                            <th scope="col">Request Status</th>
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
                    <hr>

                    <table class="table table-responsive-sm">
                            <br>
                            <h2 class="text-center">My Requests</h2>
                        <thead>
                          <tr>
                            <th scope="col">Request Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Masnod Status</th>
                            <th>Delivery Date</th>
                            <th scope="col">Request Status</th>
                            <th scope="col"></th>
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
                        </tbody>
                      </table>

                    <table class="table table-responsive-sm">
                            <br>
                            <h2 class="text-center">Form Vsand Request</h2>
                        <thead>
                          <tr>
                            <th scope="col">Request Description</th>
                            <th scope="col">Category</th>

                            <th scope="col">Masnod Status</th>
                            <th>Delivery Date</th>
                            <th scope="col">Request Status</th>
                            <th scope="col"></th>
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
                    <hr>

                </div>


            <div id="about" class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <table class="table table-responsive-sm">
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
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
              <hr>

          </div>
      </div>
  </div>
</div>








@endsection
