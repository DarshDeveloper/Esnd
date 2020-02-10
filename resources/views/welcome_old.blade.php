<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <!--IE Compatible meta-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!--first mobile meta-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Esnd</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <!-- <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />  -->
        <link rel="stylesheet" href="{{asset('css/hover.css')}}" />
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/home-style.css')}}" />
        <link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/animate.css')}}" />




        <!--[if lt IE 9]-->
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <!--[endif]-->

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
                          <li><i class="fa fa-envelope-o color"></i> info@domain.com</li>
                        </ul>
                      </div>
                      <div class="fl_right">
                        <ul>
                          <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
                          <li>
                              <a href="#" id="login">Login</a>

                                		<!-- Modal -->

			<div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content nav-modal">
                            <div class="modal-header" style="padding:35px 50px;">



                                 <div class="form-group">
                                    <label>Login As</label>
                                    <select id='user_login'>
                                        <option data-user="admin">Admin</option>
                                        <option data-user="sand">Sand</option>
                                        <option data-user="masnod">Masnod</option>
                                        <option data-user="vsand">Vsand</option>
                                        <option data-user="vmasnod">Vmasnod</option>

                                    </select>
                                </div>

                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>

                              <div class="text-center" id="mes" style="color:red">
                                {{$errors->first()}}
                              </div>
                            
                            <div class=" modal-body" style="padding:40px 50px;">
                                <form role="form" action="{{ route('login') }}" method="POST"  aria-label="{{ __('Login') }}" class="active show wow bounceIn" id="admin">
                                    <h4><span id="" class="glyphicon glyphicon-lock"></span>Login As Admin</h4>
                                    <div class="form-group">@csrf
                                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                        <input type="email" id="username" class="form-control" placeholder="Enter email" name="email">
                                        <img id="myImg" src="" height="20" width="20" alt="">
                                        <p id="myusername"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                        <input type="password" id="pwd" class="form-control" placeholder="Enter password" name="password">
                                        <img id="myImg2" src="" height="20" width="20" alt="">
                                        <p id="mypwd"></p>
                                    </div>
                                    <button type="submit" onclick="myFunction()" class="btn btn-outline-secondary btn-block">Login</button>
                                </form>
                                <form role="form" id="sand" action="sand/login" class="show wow bounceIn" method="POST">
                                    <h4><span id="" class="glyphicon glyphicon-lock"></span>Login As Sand</h4>
                                    <div class="form-group">
                                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                        <input type="text" id="username" class="form-control" placeholder="Enter email" name="email">
                                        <img id="myImg" src="" height="20" width="20" alt="">
                                        <p id="myusername"></p>@csrf
                                    </div>
                                    <div class="form-group">
                                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                        <input type="password" id="pwd" class="form-control" placeholder="Enter password" name="password">
                                        <img id="myImg2" src="" height="20" width="20" alt="">
                                        <p id="mypwd"></p>
                                    </div>
                                    <button type="submit"  class="btn btn-outline-secondary btn-block">Login</button>
                                </form>
                                <form role="form" id="vsand" action="vsand/login" class="show wow bounceIn" method="POST">
                                    <h4><span id="" class="glyphicon glyphicon-lock"></span>  Login As Vsand</h4>
                                    <div class="form-group">
                                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                        <input type="text" id="username" class="form-control" placeholder="Enter email" name="email">
                                        <img id="myImg" src="" height="20" width="20" alt="">
                                        <p id="myusername"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                        <input type="password" id="pwd" class="form-control" placeholder="Enter password" name="password">
                                        <img id="myImg2" src="" height="20" width="20" alt="">
                                        <p id="mypwd"></p>@csrf
                                    </div>
                                    <button type="submit"  class="btn btn-outline-secondary btn-block">Login</button>
                                </form>
                                <form role="form" id="masnod" class="show wow bounceIn" method="POST" action="/masnod/login">

                                    <h4><span id="" class="glyphicon glyphicon-lock"></span>  Login As Masnod</h4>

                                      <div class="form-group">
                                          <label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
                                          <input type="text" id="username" class="form-control" placeholder="Enter email" name="email">
                                          <img id="myImg" src="" height="20" width="20" alt="">
                                          <p id="myusername"></p>@csrf
                                      </div>

                                    <div class="form-group">
                                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                        <input type="password" id="pwd" class="form-control" placeholder="Enter password" name="password">
                                        <img id="myImg2" src="" height="20" width="20" alt="">
                                        <p id="mypwd"></p>
                                    </div>
                                    <button type="submit"  class="btn btn-outline-secondary btn-block">Login</button>
                                </form>
                                <form role="form" id="vmasnod" action="vmasnod/login" class="show wow bounceIn" method="POST" >
                                    <h4><span id="" class="glyphicon glyphicon-lock"></span>  Login As Vmasnod</h4>
                                    <div class="form-group">
                                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                        <input type="text" id="username" class="form-control" placeholder="Enter email" name="email">
                                        <img id="myImg" src="" height="20" width="20" alt="">
                                        <p id="myusername"></p>@csrf
                                    </div>
                                    <div class="form-group">
                                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                        <input type="password" id="pwd" class="form-control" placeholder="Enter password" name="password">
                                        <img id="myImg2" src="" height="20" width="20" alt="">
                                        <p id="mypwd"></p>
                                    </div>
                                    <button type="submit"  class="btn btn-outline-secondary btn-block">Login</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-dark btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

                            </div>
                        </div>

                    </div>
                </div>

                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Register<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="sand/register">Sign Up Sand</a></li>
                        <li><a href="masnod/register">Sign Up Masnod</a></li>
                    </ul>
                </li>
            </ul>
            </div>
        </div>
        </div>
        <h1 class="text-center">Esnd</h1>
            <div class="clearfix"></div>
    </div>
    </header>
    </div>

        <!-- Start section navbar -->

        <nav class="navbar navbar-dark bg-dark navbar-expand-md navbar-light navbar-laravel navbar-right">
            <div class="container">


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse navbar-right" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      <li class="active"><a class="nav-link" href="#">home</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">download applecation</a></li>
                      <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                      <li class="nav-item"><a class="nav-link" href="#services">SERVICES</a></li>
                      <li class="nav-item"><a class="nav-link" href="#contact">Contact </a></li>
                      <li class="nav-item"><a  class="nav-link" href="#gallery">OUR GALLERY </a></li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                    </ul>
                </div>
            </div>
        </nav>

             <!-- End section navbar -->

            <div class="images">
                <div class="overlay">
                    <div class="container">
                        <h1 class="text-center text">ESND</h1>
                        <p class="text-center paragraph">Giving of God. Contribute from what God has given you</p>
                    </div>
                </div>
            </div>


            <!-- Start section about -->
            <div class="container">
                <div class="about">
                    <h2 class="h1" id="about">ABOUT</h2>
                    <div class="row">
                        <div class="col-md-4 crl1 about_grid">
                            <i class="fa fa-university" aria-hidden="true"></i>
                            <h4>SAND</h4>
                            <P>This icon not look right or giving you trouble on your site or project? Let us know by filing a new issue. </P>
                            <button class="more-bttn" data-toggle="modal" data-target="#examplemodal">RED MORE</button>
                        </div>
                        <div class="col-md-4 crl2 about_grid">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <h4>ADMIN</h4>
                            <P>This icon not look right or giving you trouble on your site or project? Let us know by filing a new issue. </P>
                            <button class="more-bttn" data-toggle="modal" data-target="#examplemodal">RED MORE</button>
                        </div>
                        <div class="col-md-4 crl3 about_grid">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            <h4>MASNOD</h4>
                            <P>This icon not look right or giving you trouble on your site or project? Let us know by filing a new issue. </P>
                            <button class="more-bttn" data-toggle="modal" data-target="#examplemodal">RED MORE</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End section about -->


            <!-- Start section services -->

            <div class="services">
                <div class="container">
                    <h2 class="h1" id="services">services</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="services_grid">
                                <div class="row">
                                    <div class="col-sm-12 col-md-2 services_grid1">
                                        <div class="services_grid-lefft">
                                            <i class="fa fa-flask"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 services_grid1 services_grid_right">
                                        <h3>sand</h3>
                                    </div>
                                    <div class="col-sm-12 col-md-6 services_grid2">
                                        <p><span><i class="fa fa-long-arrow-alt-right"></i></span>
                                            ESND ESND ESND
                                        </p>
                                        <p><span><i class="fa fa-long-arrow-alt-right"></i></span>
                                            ESND ESND ESND
                                        </p>
                                        <button class="more-detalis" data-toggle="modal" data-target="#examplemodal">RED MORE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="services_grid">
                                <div class="row">
                                    <div class="col-sm-12 col-md-2 services_grid1">
                                        <div class="services_grid-lefft">
                                            <i class="fa fa-flask"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 services_grid1 services_grid_right">
                                        <h3>masnod</h3>
                                    </div>
                                    <div class="col-sm-12 col-md-6 services_grid2">
                                        <p><span><i class="fa fa-long-arrow-alt-right"></i></span>
                                            ESND ESND ESND
                                        </p>
                                        <p><span><i class="fa fa-long-arrow-alt-right"></i></span>
                                            ESND ESND ESND
                                        </p>
                                        <button class="more-detalis" data-toggle="modal" data-target="#examplemodal">RED MORE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="services_grid">
                                <div class="row">
                                    <div class="col-sm-12 col-md-2 services_grid1">
                                        <div class="services_grid-lefft">
                                            <i class="fa fa-flask"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 services_grid1 services_grid_right">
                                        <h3>vsand</h3>
                                    </div>
                                    <div class="col-sm-12 col-md-6 services_grid2">
                                        <p><span><i class="fa fa-long-arrow-alt-right"></i></span>
                                            ESND ESND ESND
                                        </p>
                                        <p><span><i class="fa fa-long-arrow-alt-right"></i></span>
                                            ESND ESND ESND
                                        </p>
                                        <button class="more-detalis" data-toggle="modal" data-target="#examplemodal">RED MORE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="services_grid">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-2 services_grid1">
                                            <div class="services_grid-lefft">
                                                <i class="fa fa-flask"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 services_grid1 services_grid_right">
                                            <h3>vmasnod</h3>
                                        </div>
                                        <div class="col-sm-12 col-md-6 services_grid2">
                                            <p><span><i class="fa fa-long-arrow-alt-right"></i></span>
                                                ESND ESND ESND
                                            </p>
                                            <p><span><i class="fa fa-long-arrow-alt-right"></i></span>
                                                ESND ESND ESND
                                            </p>
                                            <button class="more-detalis" data-toggle="modal" data-target="#examplemodal">RED MORE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>

            <!-- End section services -->

            <!-- Start section awesome -->

            <div class="awesome text-center">
                <div class="container">
                    <h2 class="h1 head-border-center">WHY THIS Is AWESOME</h2>
                    <p class="awesome-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="row">
                        <div class="col-md-4 feat-box wow bounceInDown" data-wow-duration="3s" data-wow-offset="200">
                            <i class="fa fa-lightbulb-o fa-2x"></i>
                            <h3>ESND</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra.</p>
                        </div>
                        <div class="col-md-4 feat-box wow bounceInUp" data-wow-duration="3s" data-wow-offset="200">
                            <i class="fa fa-keyboard-o fa-2x"></i>
                            <h3>ESND</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra.</p>
                        </div>
                        <div class="col-md-4 feat-box wow bounceInDown" data-wow-duration="3s" data-wow-offset="200">
                            <i class="fa fa-bolt fa-2x"></i>
                            <h3>ESND</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End section awesome -->

            <!-- Start section Testimonials  -->

		<div class="Testimonials">
                <div class="container">
                    <h2 class="h1 head-border-center text-center">WHAT OUR CUSTOMERS ARE SAYING</h2>
                    <p class="tes-desc text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="row">
                        <!-- start column 4 -->
                        <div class="col-md-4 wow bounceIn" data-wow-duration="3s" data-wow-offset="200" data-wow-delay=".5s">
                            <p class="client-say">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra.</p>
                            <div class="media">
                                <div class="media-left">
                                    <img class="mr-3 text-center" src="Images/3.png" alt="Generic placeholder image">
                                </div>
                            </div>
                        </div>
                        <!-- End column 4 -->
                        <!-- start column 4 -->
                        <div class="col-md-4 wow bounceIn" data-wow-duration="3s" data-wow-offset="200" data-wow-delay="1s">
                            <p class="client-say">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra.</p>
                            <div class="media">
                                <div class="media-left">
                                    <img class="mr-3 text-center" src="Images/3.png" alt="Generic placeholder image">
                                </div>
                            </div>
                        </div>
                        <!-- End column 4 -->
                        <!-- start column 4 -->
                        <div class="col-md-4 wow bounceIn" data-wow-duration="3s" data-wow-offset="200" data-wow-delay="1.5s">
                            <p class="client-say">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra.</p>
                            <div class="media">
                                <div class="media-left">
                                    <img class="mr-3 text-center" src="Images/3.png" alt="Generic placeholder image">
                                </div>
                            </div>
                        </div>
                        <!-- End column 4 -->
                    </div>
                </div>
            </div>

            <!-- End section Testimonials  -->

            <!-- Start section contact -->

            <section class="contact-us text-center">
                <div class="fields">
                    <div class="container">

                            <i class="fa fa-headphones fa-5x"></i>
                            <h2 class="h1" id="contact">Contact Us</h2>
                            <p class="lead">for more informations contact us</p>
                            <!-- strat form group -->

                            <form role="form">
                              <div class="row">
                                <div class="col-md-6 wow bounceInLeft" data-wow-duration="2s" data-wow-offset="250">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="User Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Cell Phone">
                                    </div>
                                </div>
                                <div class="col-md-6 wow bounceInRight" data-wow-duration="2s" data-wow-offset="250">
                                    <div class="form-group">
                                        <textarea class="form-control input-lg" placeholder="Your Message"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-danger btn-block btn-lg">Contact Us</button>
                                </div>
                              </div>
                              <div class="row">

                              </div>
                            </form>
                            <!-- End form group -->
                        </div>
                    </div>
                </div>
            </section>

        <!-- End section contact -->

        <!-- Start section our gallary -->

        <div class="gallery">
            <h2 class="h1" id="gallery">OUR GALLERY</h2>
            <div class="gallery-grids">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="" href="Images/07.jpg" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/01.jpg">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="" href="Images/08.jpg" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/02.jpg">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="" href="Images/09.jpg" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/03.jpg">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="" href="Images/010.jpg" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/04.jpg">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="" href="Images/05.png" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/011.jpg">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="" href="Images/012.jpg" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/06.jpg">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- End section our gallary -->


		<!-- Start section footer -->

		<div class="footer" id="footer">
                <div class="overlay">
                    <div class="footer-links">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h2>CONTACT US</h2>
                                    <P>Subscribe</P>
                                    <button>Send</button>
                                    <input type="text" placeholder="Type your email address">
                                    <h2 class="desc-img">Now available on</h2>
                                    <img src="images/store play.png">
                                    <img src="images/app store.png">
                                </div>
                                <div class="col-lg-3">
                                    <ul class="links">
                                        <li><a>SIGN UP</a></li>
                                        <li><a>LOGIN</a></li>
                                        <li><a hraf="page-scroll">Download The App</a></li>
                                        <li><a href="#header">HOME</a></li>
                                        <li><a href="#about">ABOUT</a></li>
                                        <li><a href="#services">SERVICES</a></li>
                                        <li><a href="#contact">CONTACT US</a></li>
                                        <li><a href="#gallery">OUR GALLERY</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-2">
                                    <h2>OUR PROGRAMS</h2>
                                </div>
                                <div class="col-lg-3">
                                    <h2>ESND</h2>
                                    <p class="desc">We're more than just a blog! Our online software helps marketers turn analytics into insights that guide decision-making and growth. </p>
                                    <i class="fa fa-facebook fa-3x"></i>
                                    <i class="fa fa-twitter fa-3x"></i>
                                    <i class="fa fa-youtube fa-3x"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

		<!-- End section footer -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

        <script src="{{asset('js/lightbox.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script>new WOW().init();</script>
    <script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
    @if(count($errors)>0)
      <script>$("#myModal").modal()</script>
    @endif
</body>
</html>
