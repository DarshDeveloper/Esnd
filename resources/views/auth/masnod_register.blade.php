<!DOCTYPE html>
<html>
    <head>
        <title>Masnod Register</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/style_masnod.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/hover.css')}}" />
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('css/home-style.css')}}" />
        <link rel="stylesheet" href="{{asset('css/animate.css')}}" />
    </head>
    <body>

                <!-- Start section header -->


                <div class="banner">
                        <header>
                            <div class="container" style="text-align: center;">
                            <div class="wrapper row0">
                                <div id="topbar" class="hoc clear">
                                  <div class="fl_left">
                                    <ul>
                                      <li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
                                      <li><i class="fa fa-envelope-o color"></i> aaskalan@edgeconsultancyinc.com</li>
                                    </ul>
                                  </div>
                                  <div class="fl_right">
                                    <ul>
                                      <li><a href="/home"><i class="fa fa-lg fa-home"></i></a></li>


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Register<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/sand/register">Sign Up Sand</a></li>
                                    <li><a href="/masnod/register">Sign Up Masnod</a></li>
                                </ul>
                            </li>
                        </ul>
                        </div>
                    </div>
                    </div>
                    <h1 class="text-center head">Esnd</h1>
                        <div class="clearfix"></div>
                </div>
                </header>
                </div>

                    <!-- Start section navbar -->






                         <!-- End section navbar -->


                <!-- Start section masnod regester -->
                <div class="Vsand">
                    <div class="overlay">
                        <div class="container pt-4 mt-4 blue-grey ">
                            <div class="row">
                                <div class="col-md-7">
                                    <h2 class="h1 text-left">ESND</h2>
                                    <p class="text-left">We're more than just a blog! Our online software helps marketers turn analytics into insights that guide decision-making and growth.</p>
                                </div>
                                <div class="col-md-5">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3 class="text-left">Masnod Register</h3>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </div>
                                        {{--<div class="col-md-12 text-center" style="color:red">--}}
                                          {{--{{$errors->first()}}--}}
                                        {{--</div>--}}
                                    </div>
                                    <hr>
                                    <form action="register" method="POST">


                                    <div class="row">
                                        <label class="lable col-md-3 control-lable">Name</label>
                                        <div class="col-md-9">
                                            <input type="Name" class="form-control for{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name" value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="lable col-md-3 control-lable">Email</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control for{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" id="email" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="row">
                                        <label class="lable col-md-3 control-lable">Governorate</label>
                                        <div class="col-md-9">
                                            <input type="Governorate" class="form-control for{{ $errors->has('governorate') ? ' is-invalid' : '' }}" name="governorate" placeholder="Governorate" value="{{ old('governorate') }}">
                                            @if ($errors->has('governorate'))
                                                <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('governorate') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="lable col-md-3 control-lable">Address</label>@csrf
                                        <div class="col-md-9">
                                            <input type="Address" class="form-control for{{ $errors->has('address') ? ' is-invalid' : '' }}" id="autocomplete_search" autocomplete="on" name="address" placeholder="Address" value="{{ old('address') }}">
                                            @if ($errors->has('address'))
                                                <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                        <div class="row hidden">
                                        <label class="lable col-md-3 control-lable">Latitude</label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control for{{ $errors->has('lat') ? ' is-invalid' : '' }}" id="lat" name="lat" >
                                            @if ($errors->has('lat'))
                                                <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('lat') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                        <div class="row hidden">
                                            <label class="lable col-md-3 control-lable">Longitude</label>
                                            <div class="col-md-9">
                                                <input type="hidden" class="form-control for{{ $errors->has('lng') ? ' is-invalid' : '' }}" id="lng" name="lng" >
                                                @if ($errors->has('lng'))
                                                    <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('lng') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>

                                    <div class="row">
                                        <label class="lable col-md-3 control-lable">Telephone</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control for{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" placeholder="Telephone" maxlength="11" minlength="10" value="{{ old('telephone') }}">
                                            @if ($errors->has('telephone'))
                                                <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('telephone') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="lable col-md-3 control-lable">Social id</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control for{{ $errors->has('social_id') ? ' is-invalid' : '' }}" name="social_id" placeholder="Social id" maxlength="14" minlength="14" value="{{ old('social_id') }}">
                                            @if ($errors->has('social_id'))
                                                <span class="text-danger" role="alert">
                                                 <strong>{{ $errors->first('social_id') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                            <label class="lable col-md-3 control-lable">Password</label>
                                            <div class="col-md-9">
                                                <input type="Password" class="form-control for{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" minlength="6">
                                                @if ($errors->has('password'))
                                                    <span class="text-danger" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="lable col-md-3 control-lable">Confirm Password
                                                </label>
                                            <div class="col-md-9">
                                                <input type="Password" class="form-control for" name="password_confirmation" placeholder="Confirm Password" minlength="6">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info">Register</button>
                                        <!-- <button  class="btn btn-warning">cancel</button> -->
                                      </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

              <!-- Start section footer -->


        <footer class="footer-section">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fa fa-map-marker"></i>
                            <div class="cta-text">
                                <h4>Find us</h4>
                                <span> Dokki, Giza, Egypt, 10A Hussein Wassef Street,</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fa fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <span>01287078394</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fa fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Mail us</h4>
                                <span>aaskalan@edgeconsultancyinc.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-5 pb-5 mt-3">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 mb-50 ">
                        <div class="footer-widget">

                            <div class="footer-social-icon text-center">
                                <span>Follow us</span>
                                <a target="_blank" href="https://www.facebook.com/EdgeConsultancyInc/"><i class="fa fa-facebook-f facebook-bg"></i></a>
                                <a href="#"><i class="fa fa-twitter twitter-bg"></i></a>
                                <a href="#"><i class="fa fa-google-plus google-bg"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-lg-left">
                        <div class="copyright-text">
                            <p>By &copy; Edge Consultancy Egypt</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">

                    </div>
                </div>
            </div>
        </div>
    </footer>




            <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

                <!-- End section footer -->

        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/custom.js')}}"></script>
                <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js"></script>
                <script>
                    bootstrapValidate('#email', 'email:Enter a valid email address');
                </script>
                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb0Ojs73xsq7gnh9iafgWg6eugrFiV5bo&amp;libraries=places"></script>

                <script>
                    google.maps.event.addDomListener(window, 'load', initialize);

                    function initialize() {
                        var input = document.getElementById('autocomplete_search');
                        var autocomplete = new google.maps.places.Autocomplete(input);
                        google.maps.event.addListener(autocomplete,'place_changed', function () {
                            var place = autocomplete.getPlace();
                            // place variable will have all the information you are looking for.
                            document.getElementById('lat').value = place.geometry.location.lat();
                            document.getElementById('lng').value = place.geometry.location.lng();
                        });
                    }

                </script>
    </body>
</html>
