@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="governorate" class="col-md-4 col-form-label text-md-right">{{ __('Governorate') }}</label>

                            <div class="col-md-6">
                                <input id="governorate" type="text" class="form-control{{ $errors->has('governorate') ? ' is-invalid' : '' }}" name="governorate" value="{{ old('governorate') }}" required>

                                @if ($errors->has('governorate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('governorate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<!--                        <div class="form-group row">-->
<!--                            <label for="social_id" class="col-md-4 col-form-label text-md-right">{{ __('Social Id') }}</label>-->
<!---->
<!--                            <div class="col-md-6">-->
<!--                                <input id="social_id" type="text" class="form-control{{ $errors->has('social_id') ? ' is-invalid' : '' }}" name="social_id" value="{{ old('social_id') }}" required>-->
<!---->
<!--                                @if ($errors->has('social_id'))-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $errors->first('social_id') }}</strong>-->
<!--                                    </span>-->
<!--                                @endif-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-group row">-->
<!--                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>-->
<!---->
<!--                            <div class="col-md-6">-->
<!--                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>-->
<!---->
<!--                                @if ($errors->has('address'))-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $errors->first('address') }}</strong>-->
<!--                                    </span>-->
<!--                                @endif-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-group row">-->
<!--                            <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment Method') }}</label>-->
<!---->
<!--                            <div class="col-md-6">-->
<!--                                <input id="payment_method" type="text" class="form-control{{ $errors->has('payment_method') ? ' is-invalid' : '' }}" name="payment_method" value="{{ old('payment_method') }}" required>-->
<!---->
<!--                                @if ($errors->has('payment_method'))-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $errors->first('payment_method') }}</strong>-->
<!--                                    </span>-->
<!--                                @endif-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        {{--<div class="form-group row">--}}-->
<!--                            {{--<label for="social_id_photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo of Social Id') }}</label>--}}-->
<!---->
<!--                            {{--<div class="col-md-6">--}}-->
<!--                                {{--<input id="social_id_photo" type="file" class="form-control{{ $errors->has('social_id_photo') ? ' is-invalid' : '' }}" name="social_id_photo" value="{{ old('social_id_photo') }}" required>--}}-->
<!---->
<!--                                {{--@if ($errors->has('social_id_photo'))--}}-->
<!--                                    {{--<span class="invalid-feedback" role="alert">--}}-->
<!--                                        {{--<strong>{{ $errors->first('social_id_photo') }}</strong>--}}-->
<!--                                    {{--</span>--}}-->
<!--                                {{--@endif--}}-->
<!--                            {{--</div>--}}-->
<!--                        {{--</div>--}}-->
<!---->
<!--                        {{--<div class="form-group row">--}}-->
<!--                            {{--<label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>--}}-->
<!---->
<!--                            {{--<div class="col-md-6">--}}-->
<!--                                {{--<input id="status" type="text" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value="{{ old('status') }}" required>--}}-->
<!---->
<!--                                {{--@if ($errors->has('status'))--}}-->
<!--                                    {{--<span class="invalid-feedback" role="alert">--}}-->
<!--                                        {{--<strong>{{ $errors->first('status') }}</strong>--}}-->
<!--                                    {{--</span>--}}-->
<!--                                {{--@endif--}}-->
<!--                            {{--</div>--}}-->
<!--                        {{--</div>--}}-->
<!---->
<!--                        <div class="form-group row">-->
<!--                            <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>-->
<!---->
<!--                            <div class="col-md-6">-->
<!--                                <input id="telephone" type="tel" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" value="{{ old('telephone') }}" required>-->
<!---->
<!--                                @if ($errors->has('telephone'))-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $errors->first('telephone') }}</strong>-->
<!--                                    </span>-->
<!--                                @endif-->
<!--                            </div>-->
<!--                        </div>-->

                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
            </div>
        </div>
    </div>
</div>
@endsection
