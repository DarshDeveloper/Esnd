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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />  -->
        <link rel="stylesheet" href="{{asset('css/hover.css')}}" />
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/home-style.css')}}" />
        <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('css/animate.css')}}" />





        <!--[if lt IE 9]-->
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <!--[endif]-->

    </head>
    <body>

        <!-- Start section header -->


        <div class="banner" id="home">
            <header>
                <div class="container">
                <div class="wrapper row0">
                    <div id="topbar" class="hoc clear">
                      <div class="fl_left">
                        <ul>
                          <li><i class="fa fa-phone"></i> +00 (128) 7078394</li>
                          <li><i class="fa fa-envelope-o color"></i> aaskalan@edgeconsultancyinc.com</li>
                        </ul>
                      </div>
                      <div class="fl_right">
                        <ul>


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Language (EN)<span class="caret"></span></a>
                            <ul class="dropdown-menu language" role="menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">Arabic</a></li>
                            </ul>
                        </li>

                          <li><a href="../"><i class="fa fa-lg fa-home"></i></a></li>

                          <li>
                              <a href="#" id="login" data-toggle="modal" data-target="#myModal">Login</a>
                          </li>

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
                                                      <input type="email"  class="form-control" placeholder="Enter email" name="email">
                                                      <img id="myImg" src="" height="20" width="20" alt="">
                                                      <p id="myusername"></p>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                                      <input type="password"  class="form-control" placeholder="Enter password" name="password">
                                                      <img id="myImg2" src="" height="20" width="20" alt="">
                                                      <p id="mypwd"></p>
                                                  </div>
                                                  <button type="submit" onclick="myFunction()" class="btn btn-outline-secondary btn-block">Login</button>
                                              </form>
                                              <form role="form" id="sand" action="sand/login" class="show wow bounceIn" method="POST">
                                                  <h4><span id="" class="glyphicon glyphicon-lock"></span>Login As Sand</h4>
                                                  <div class="form-group">
                                                      <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                                      <input type="text"  class="form-control" placeholder="Enter email" name="email">
                                                      <img id="myImg" src="" height="20" width="20" alt="">
                                                      <p id="myusername"></p>@csrf
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                                      <input type="password"  class="form-control" placeholder="Enter password" name="password">
                                                      <img id="myImg2" src="" height="20" width="20" alt="">
                                                      <p id="mypwd"></p>
                                                  </div>
                                                  <button type="submit"  class="btn btn-outline-secondary btn-block">Login</button>
                                              </form>
                                              <form role="form" id="vsand" action="vsand/login" class="show wow bounceIn" method="POST">
                                                  <h4><span id="" class="glyphicon glyphicon-lock"></span>  Login As Vsand</h4>
                                                  <div class="form-group">
                                                      <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                                      <input type="text"  class="form-control" placeholder="Enter email" name="email">
                                                      <img id="myImg" src="" height="20" width="20" alt="">
                                                      <p id="myusername"></p>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                                      <input type="password"  class="form-control" placeholder="Enter password" name="password">
                                                      <img id="myImg2" src="" height="20" width="20" alt="">
                                                      <p id="mypwd"></p>@csrf
                                                  </div>
                                                  <button type="submit"  class="btn btn-outline-secondary btn-block">Login</button>
                                              </form>
                                              <form role="form" id="masnod" class="show wow bounceIn" method="POST" action="/masnod/login">

                                                  <h4><span id="" class="glyphicon glyphicon-lock"></span>  Login As Masnod</h4>

                                                    <div class="form-group">
                                                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
                                                        <input type="text"  class="form-control" placeholder="Enter email" name="email">
                                                        <img id="myImg" src="" height="20" width="20" alt="">
                                                        <p id="myusername"></p>@csrf
                                                    </div>

                                                  <div class="form-group">
                                                      <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                                      <input type="password"  class="form-control" placeholder="Enter password" name="password">
                                                      <img id="myImg2" src="" height="20" width="20" alt="">
                                                      <p id="mypwd"></p>
                                                  </div>
                                                  <button type="submit"  class="btn btn-outline-secondary btn-block">Login</button>
                                              </form>
                                              <form role="form" id="vmasnod" action="vmasnod/login" class="show wow bounceIn" method="POST" >
                                                  <h4><span id="" class="glyphicon glyphicon-lock"></span>  Login As Vmasnod</h4>
                                                  <div class="form-group">
                                                      <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                                      <input type="text"  class="form-control" placeholder="Enter email" name="email">
                                                      <img id="myImg" src="" height="20" width="20" alt="">
                                                      <p id="myusername"></p>@csrf
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                                      <input type="password"  class="form-control" placeholder="Enter password" name="password">
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

    </div>
    </header>
    </div>

        <!-- Start section navbar -->

        <nav class="navbar bg-dark navbar-expand-md navbar-light navbar-laravel navbar-fixed-top">
            <div class="container">


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

               <a href="#home"> <img class="image_header" src="Images/3.png"></a>

            <div class="clearfix"></div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav    ml-auto ">
                      <li class="active"><a class="nav-link" href="#home">Home</a></li>
                      <li class="nav-item"><a class="nav-link" target="_blank" style="color:#fff" href="https://play.google.com/store/apps/details?id=esndprod.ionic">Download Application</a></li>
                      <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                      <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                      <li class="nav-item"><a class="nav-link" href="#contact">Contact </a></li>
                      <li class="nav-item"><a  class="nav-link" href="#gallery">Our Gallery </a></li>

                    </ul>

                </div>

            </div>
        </nav>

            <!-- End section navbar -->


            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="Images/header2.jpg" alt="First slide">
      <div class="carousel-caption">
        <h2 class="h1">Esnd</h2>
        <p class="lead" style="color:#fff; font-size:14px; line-height:1.5">
            ESND will connect the different society layers system, by giving the Rich the ability to support the Poor and making impact and progress in their life. Currently all donation and support systems are going manually through mosques, churches, clubs and groups. This project will allow the new generations to be able to support and making impacts on each other life.        </p>
        <button type="button" class="btn btn-dark" style="margin-top:10px"><a target="_blank" href="https://play.google.com/store/apps/details?id=esndprod.ionic" style=" text-decoration:none; color:#fff">Download App</a></button>
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="Images/header.jpg" alt="Second slide">
      <div class="carousel-caption">
        <h2 class="h1">Esnd</h2>
        <p class="lead" style="color:#fff; font-size:14px; line-height:1.5">
            ESND will connect the different society layers system, by giving the Rich the ability to support the Poor and making impact and progress in their life. Currently all donation and support systems are going manually through mosques, churches, clubs and groups. This project will allow the new generations to be able to support and making impacts on each other life.
        </p>
        <button type="button" class="btn btn-dark" style="margin-top:10px"><a target="_blank" href="https://play.google.com/store/apps/details?id=esndprod.ionic" style=" text-decoration:none; color:#fff">Download App</a></button>
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="Images/header1.jpg" alt="Third slide">
      <div class="carousel-caption">
        <h2 class="h1">Esnd</h2>
        <p class="lead" style="color:#fff; font-size:14px; line-height:1.5">
            ESND will connect the different society layers system, by giving the Rich the ability to support the Poor and making impact and progress in their life. Currently all donation and support systems are going manually through mosques, churches, clubs and groups. This project will allow the new generations to be able to support and making impacts on each other life.        </p>
            <button type="button" class="btn btn-dark" style="margin-top:10px;"><a target="_blank" href="https://play.google.com/store/apps/details?id=esndprod.ionic" style=" text-decoration:none; color:#fff">Download App</a></button>
    </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>





            <!-- Start section about -->


        <div class="container" id="about">
            <div class="logo"></div>
            <div class="message-box">

                <div class="message-content">
                    <h2 class="success">About Us</h2>
                    <div class="lead text-center">
                        <p>ESND will connect the different society layers system, by giving the Rich the ability to support the Poor and making impact and progress in their life.  Currently all donation and support systems are going manually through mosques, churches, clubs and groups.  This project will allow the new generations to be able to support and making impacts on each other life. The SANED can support The MASNOD on specific way or task. The MASNOD can list all his/her specific needs and the SANED can choose how to help/donate. The Rich can help, specify, and track all work done/progress by the poor.  Improving both lives of RICH and POOR by connecting them thru  ESND will allow us to work in non-repeatable/fraud-safe environment and better track the 7.eer activities and donations.  The addition of ESND will provide a more accurate history to the SANED and will create a permanent �complete picture� of all of the activity associated with SAND activities.  This social effort is expected to increase security and reduce the risk for fraud through the society.  ESND will improve public service by reducing errors, eliminating additional data entry processing delays, and allowing the public service clerks to provide immediate up-to-date status, all within one place.</p>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="message-shadow"></div>
        </div>

        <!-- End section about -->


              <!-- Start section services table -->



        <section id="webcoderskull-area" class="webcoderskull-law-area">
            <div class="container" id="services">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Our Services</h2>
                        <p class="sub-heading">Sed ut perspiciatis, unde omnis isteew nouat error sit voluptatem etusasi accu ndolor <br>laudantium, totam rem aperiam eaqu m </p>
                        <div class="separator">
                            <span class="single-line-middle"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="webcoderskull-item">
                            <i class="fa fa-hand-rock-o fa-5x hand" aria-hidden="true"></i>
                            <h3><a href="#">Orphen Support Program</a></h3>
                            <p>Sponsor a Child. Create a Future.</p>
                            <!-- <a href="" class="learn-more">Learn more</a> -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="webcoderskull-item">
                            <i class="fa fa-wheelchair fa-5x" aria-hidden="true"></i>
                            <h3><a href="#">Children With Disabilities</a></h3>
                            <p>Create Hope. Sponsor a Disabled Child.</p>
                            <!-- <a href="" class="learn-more">Learn more</a> -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="webcoderskull-item">
                            <i class="fa fa-user-md fa-5x" aria-hidden="true"></i>
                            <h3><a href="#">Health care</a></h3>
                            <p>Emergency and long term medical assistance for the needy and injured.</p>
                            <!-- <a href="" class="learn-more">Learn more</a> -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="webcoderskull-item">
                            <i class="fa fa-graduation-cap fa-5x" aria-hidden="true"></i>
                            <h3><a href="#">Education Support</a></h3>
                            <p>Student Scholarships, Rebuilding Schools and Adult Literacy Programs.</p>
                            <!-- <a href="http://www.webcoderskull.com" target="_blank" class="learn-more">Learn more</a> -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="webcoderskull-item">
                        <i class="fa fa-users fa-5x" aria-hidden="true"></i>
                            <h3><a href="#">Physical Rehabilitation</a></h3>
                            <p>Physiotherapy and artificial limbs for those who've lost mobility.</p>
                            <!-- <a href="http://www.webcoderskull.com" target="_blank" class="learn-more">Learn more</a> -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="webcoderskull-item">
                            <i class="fa fa-university fa-5x" aria-hidden="true"></i>
                            <h3><a href="#">Infrastructuer Development</a></h3>
                            <p>Rebuilding homes, schools and villages in Upper-Egypt areas.</p>
                            <!-- <a href="http://www.webcoderskull.com" target="_blank" class="learn-more">Learn more</a> -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="webcoderskull-item">
                            <i class="fa fa-archive fa-5x" aria-hidden="true"></i>
                            <h3><a href="#">Description: infrastructure</a></h3>
                            <p></p>
                            <!-- <a href="http://www.webcoderskull.com" target="_blank" class="learn-more">Learn more</a> -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="webcoderskull-item">
                            <i class="fa fa-gift fa-5x" aria-hidden="true"></i>
                            <h3><a href="#">Seasonal Programs</a></h3>
                            <p>Iftar and Eid Gift Donations. National Fitra and Zabeeha Programs for 28 states.</p>
                            <!-- <a href="http://www.webcoderskull.com" target="_blank" class="learn-more">Learn more</a> -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="webcoderskull-item">
                            <i class="fa fa-hand-rock-o fa-5x" aria-hidden="true"></i>
                            <h3><a href="#">Water For Life</a></h3>
                            <p>Providing clean water by placing water pumps, wells and sanitation programs covering the 28 states.</p>
                            <!-- <a href="http://www.webcoderskull.com" target="_blank" class="learn-more">Learn more</a> -->
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 text-center">
                        <div class="webcoderskull-item" style="float:right;">
                            <i class="fa fa-thumbs-up fa-5x" aria-hidden="true"></i>
                            <h3><a href="#">Skill Development</a></h3>
                            <p>Empowering Youth/Women through skills development and vocational training.</p>
                            <!-- <a href="http://www.webcoderskull.com" target="_blank" class="learn-more">Learn more</a> -->
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6" style="float:left;">
                        <div class="webcoderskull-item ">
                            <i class="fa fa-child fa-5x" aria-hidden="true"></i>
                            <h3><a href="#">Youth Empowermen</a></h3>
                            <p>Providing Summer Internships and programs for Kids.</p>
                            <!-- <a href="http://www.webcoderskull.com" target="_blank" class="learn-more">Learn more</a> -->
                        </div>
                    </div>

                </div> <!-- End Row -->
            </div> <!-- End Container -->
        </section>

        <!-- End section services -->





<!-- Start section contact us -->

    <div class="contact-us" id="contact">
			<div class="container">
				<h2 class="contact-head h1 text-center head-border-center">CONTACT US</h2>
				<p class="contact-desc text-center"></p>
				<!-- start grid -->
				<div class="row">

						<div class="col-md-6">
							<input class="form-control input-lg" type="text" name="Name" placeholder="Name">
							<input class="form-control input-lg" type="Email" name="Email" placeholder="Email">
							<input class="form-control input-lg" type="text" name="Subject" placeholder="Subject">
						</div>
						<div class="col-md-6">
							<textarea class="form-control input-lg" placeholder="Message"></textarea>
						</div>

				</div>
				<!-- End grid -->
				<button class="contact-btn text-center">Send Message</button>
			</div>
		</div>

		<!-- End section contact us -->


        <!-- End section Contact Us -->



          <!-- Start section our gallary -->
        <div class="parent-container">
        <div class="gallery">
            <h2 class="h1" id="gallery">OUR GALLERY</h2>
            <div class="gallery-grids">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="image-link" href="Images/01.jpg" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/01.jpg">
                            <i class="ico-maximize"></i>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="image-link" href="Images/02.jpg" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/02.jpg">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="image-link" href="Images/03.jpg" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/03.jpg">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="image-link" href="Images/04.jpg" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/04.jpg">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="image-link" href="Images/05.png" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/05.png">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="image-link" href="Images/06.jpg" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/06.jpg">
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="image-link" href="Images/07.jpg" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/07.jpg">
                            <i class="ico-maximize"></i>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="image-link" href="Images/08.jpg" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/08.jpg">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="image-link" href="Images/09.jpg" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/09.jpg">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="image-link" href="Images/010.jpg" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/010.jpg">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="image-link" href="Images/012.jpg" data-lightbox="example-set" data-titile="" >
                            <img class="img-fluid" src="Images/012.jpg">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-6 gallery_grid_img">
                        <a class="image-link" href="Images/15.jpg" data-lightbox="example-set" data-titile="">
                            <img class="img-fluid" src="Images/15.jpg" style="width:500px; height:362px;">
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
        <!-- End section our gallary -->

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
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="#"><img src="Images/3.png" class="img-fluid" alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p>Lorem ipsum dolor sit amet, consec tetur adipisicing elit, sed do eiusmod tempor incididuntut consec tetur adipisicing
                                elit,Lorem ipsum dolor sit amet.</p>
                            </div>
                            <div class="footer-social-icon">
                                <span>Follow us</span>
                                <a href="https://www.facebook.com/EdgeConsultancyInc/"><i class="fa fa-facebook-f facebook-bg"></i></a>
                                <a href="#"><i class="fa fa-twitter twitter-bg"></i></a>
                                <a href="#"><i class="fa fa-google-plus google-bg"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="#home">Home</a></li>
                                <li><a target="_blank" href="https://play.google.com/store/apps/details?id=esndprod.ionic">Download Application</a></li>
                                <li><a href="#services">services</a></li>
                                <li><a href="#gallery">Our Gallery</a></li>
                                <li><a href="#contact">Contact</a></li>
                                <li><a href="#about">About us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Subscribe</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Don't miss to subscribe to our new feeds, kindly fill the form below.</p>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="text" placeholder="Email Address">
                                    <button><i class="fa fa-telegram"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>By &copy; Edge Consultancy Egypt</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                        <div class="footer-menu">
                            <ul>
                            <li><a href="#home">Home</a></li>
                                <li><a target="_blank" href="https://play.google.com/store/apps/details?id=esndprod.ionic">Download Application</a></li>
                                <li><a href="#services">services</a></li>
                                <li><a href="#gallery">Our Gallery</a></li>
                                <li><a href="#contact">Contact</a></li>
                                <li><a href="#about">About us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>




            <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>


<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('js/magnific-popup.js')}}"></script>



<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>





<!-- JQuery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>



    <script src="{{asset('js/wow.min.js')}}"></script>
    <script>new WOW().init();</script>
    <script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
    <script>
    $(document).ready(function(){
      $(".banner a#login").click(function () {
          $("#myModal").modal();
      });

  $("#mylink").click(function () {
    $("#myModal").hide();
    $("#myModalsignup").modal();
      });

      $('#user_login').change(function () {
          var user = $(this).children('option:checked').data('user');
          $('form.active').removeClass('active');
          $('form#' + user).addClass('active');
      });

      $('#user_signup').change(function () {
          var user = $(this).children('option:checked').data('user');
          $('form.active').removeClass('active');
          $('form#' + user).addClass('active');
      });

      $(".modal-footer p a").click(function () {
          $(".modal-footer form").show();
      });
    });

    $('.frame').click(function(){
        $('.top').addClass('open');
        $('.message').addClass('pull');
    })

    // contact us

    function countChar(val) {
  var len = val.value.length;
  if (len >= 90) {
    val.value = val.value.substring(0, 90);
  } else {
    $("#charNum").text(90 - len);
  }
}

$("textarea").change(function(){
  if ($("textarea").val() !== 0) {
    $(this).css("opacity", "0.8");
  }
});

//testimonial-slider

$('#testimonial-slider').owlCarousel({
            items:1,
            itemsDesktop:[1000,1],
            itemsDesktopSmall:[979,1],
            itemsTablet:[768,1],
            pagination: false,
            navigation:true,
            navigationText:["",""],
            slideSpeed:1000,
            autoPlay:true
        });


    </script>
    @if(count($errors))
      <script>$("#myModal").modal()</script>
    @endif
</body>
</html>
