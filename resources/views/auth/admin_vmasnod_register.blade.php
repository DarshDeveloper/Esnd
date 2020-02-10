{{--@extends('layouts.app')--}}
@extends('admin.layout')
<head>
    <title>Add Vmasnod</title>
</head>
@section('content')
<div class="container">

                    <form method="POST" action="/vmasnod/register" aria-label="{{ __('Register') }}" STYLE="margin-left: 389px;
    margin-top: 92PX">
                        @csrf
                        <h2 style="color: #0e2e42"> <b>Add Vmasnod</b> </h2>
                        <div class="form-group row">
                            <label for="name" class="col-md-8 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-8 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="social_id" class="col-md-8 col-form-label text-md-right">{{ __('Social Id') }}</label>

                            <div class="col-md-8">
                                <input id="social_id" type="text" class="form-control{{ $errors->has('social_id') ? ' is-invalid' : '' }}" name="social_id" value="{{ old('social_id') }}" required maxlength="14" minlength="14">

                                @if ($errors->has('social_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('social_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="governorate" class="col-md-8 col-form-label text-md-right">{{ __('Governorate') }}</label>

                            <div class="col-md-8">
                                <input id="governorate" type="text" class="form-control{{ $errors->has('governorate') ? ' is-invalid' : '' }}" name="governorate" value="{{ old('governorate') }}" required>

                                @if ($errors->has('governorate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('governorate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-8 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-8">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telephone" class="col-md-8 col-form-label text-md-right">{{ __('Telephone') }}</label>

                            <div class="col-md-8">
                                <input id="telephone" type="tel" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" value="{{ old('telephone') }}" required maxlength="11" minlength="10">

                                @if ($errors->has('telephone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group row">
                            <label for="password" class="col-md-8 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input type="Password" class="form-control for{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" minlength="6">
                                @if ($errors->has('password'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-8 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input type="Password" class="form-control for" name="password_confirmation" placeholder="Confirm Password" minlength="6">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>

@endsection
