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
                   <a class="nav-link" href="#">Profile <span class="sr-only"></span></a>
                </li>

            </ul>


            <ul class="navbar-nav ml-auto">

                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
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
                @endguest
            </ul>
        </div>
    </div>
</nav>

    <link href="{{ asset('css/masnod.css') }}" rel="stylesheet">

        <div class="brannd">
            <div class="masnod-dash text-center">
                <div class="container">
                        <div class="forms">
                    <div class="row">
                        <div class="col-md-7 col-sm-8 col-xs-5">
                            <h1>my information</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <label>NAME</label>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <input type="text" class="form-control" readonly name="email" value="{{$masnod->name}}">
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <label>EMAIL</label>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <input type="text" class="form-control"  readonly name="email" value="{{$masnod->email}}">
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <label>ADDRESS</label>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <input type="text" class="form-control"  readonly name="address" value="{{$masnod->address}}">
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <label>SOCIAL ID</label>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <input type="text" class="form-control" readonly   name="social_id" value="{{$masnod->social_id}}">
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <label>GOVERNORATE</label>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <input type="text" class="form-control"  readonly value="{{$masnod->governorate}}">
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <label>TELEPHONE</label>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <input type="text" class="form-control" readonly  value="{{$masnod->telephone}}">
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-2"></div>

                        <div class="col-md-5 col-sm-5 col-xs-2">
                            <img src="//esndco.com/public/attachments/{{$masnod->social_id_front_photo}}" alt="please upload social id">

                            <img src="//esndco.com/public/attachments/{{$masnod->social_id_back_photo}}" alt="please upload social id">

                            <form action='masnod_social_id' method="POST" enctype='multipart/form-data'>@csrf
                              @if(!$masnod->social_id_front_photo || !$masnod->social_id_back_photo)
                              <h2>you cannot send request before uploading photos</h2>
                              @endif

                              @if(!$masnod->valid)
                              <input type="file" name="front" class="img_btn col-md-5" multiple>Front Social ID</button>
                              <input type="file" name="back" class="img_btn col-md-5" multiple>Back Social ID</button>
                                <button type="submit" class="btn btn-success">Upload Social id</button>
                              @endif
                            </form>
                        </div>
                    </div>

                    <button type="button"><a href="edit_masnod">EDIT Information</a></button>
                </div>
@if($masnod->social_id_back_photo && $masnod->social_id_front_photo)
<form action='add_masnod_request' method="POST" enctype='multipart/form-data'>@csrf
                    <div class="masnod-request">
                        <div class="row">
                            <div class="col-md-12 col-sm-8 col-xs-5">
                                <h2 class="h1">add request</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-sm-5 col-xs-5">
                                <label>DESCRIPTION</label>
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-6">
                                <input type="text" class="form-control" placeholder="Description" name="description">
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-5">
                                    <label>CATEGORY</label>
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-6">
                                <input type="text" class="form-control" placeholder="Category"  name="category">
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-5">
                                <label>ATTACHMENT</label>
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-6">
                                <input type="file" class="form-control"  name="attachment" id="fileupload">
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-5">
                                <label>STATUS</label>
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-6">
                                <input type="text" class="form-control" placeholder="Status" name="status" >
                            </div>
                        </div>

                        <button type="submit" class="btn-sand">SEND REQUEST</button>

                    </div>
                </form>
                @endif
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th>Request Description</th>
                                        <th>Category</th>
                                        <th>Masnod Status</th>
                                        <th>request status</th>
                                        <th>Delivery date</th>
                                        <th></th>

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
                                          {{$request->delivery_date}}
                                        </td>
                                        <td>
                                          @if($request->request_status == 'm')
                                            <a href='edit_masnod_request/{{$request->id}}'>edit</a>
                                            <a href='delete_masnod_request/{{$request->id}}'>delete</a>
                                          @endif
                                        </td>
                                      </tr>
                                      @endForeach
                                    </tbody>
                                    @endif
                                </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>



@endsection
