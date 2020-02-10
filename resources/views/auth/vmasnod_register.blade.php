<!DOCTYPE html>
<html>
    <head>
        <title>Vmasand Register</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/style.')}}"/>
        <link rel="stylesheet" href="{{asset('css/hover.css')}}" />
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/style.css')}}" />
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
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <div class="row">

                                             <div class="col-md-6">
                                                <label>Login As</label>
                                                <select id='user_login'>
                                                    <option data-user="admin">Admin</option>
                                                    <option data-user="sand">Sand</option>
                                                    <option data-user="masnod">Masnod</option>
                                                    <option data-user="vsand">Vsand</option>
                                                    <option data-user="vmasnod">Vmasnod</option>

                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                        <div class=" modal-body" style="padding:40px 50px;">
                                            <form role="form" class="active show wow bounceIn" id="admin">
                                                <h4><span id="" class="glyphicon glyphicon-lock"></span>Login As Admin</h4>
                                                <div class="form-group">
                                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                                    <input type="text" id="username" class="form-control" placeholder="Enter email">
                                                    <img id="myImg" src="" height="20" width="20" alt="">
                                                    <p id="myusername"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                                    <input type="text" id="pwd" class="form-control" placeholder="Enter password">
                                                    <img id="myImg2" src="" height="20" width="20" alt="">
                                                    <p id="mypwd"></p>
                                                </div>
                                                <button type="button" onclick="myFunction()" class="btn btn-outline-secondary btn-block">Login</button>
                                            </form>
                                            <form role="form" id="sand" class="show wow bounceIn">
                                                <h4><span id="" class="glyphicon glyphicon-lock"></span>Login As Sand</h4>
                                                <div class="form-group">
                                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                                    <input type="text" id="username" class="form-control" placeholder="Enter email">
                                                    <img id="myImg" src="" height="20" width="20" alt="">
                                                    <p id="myusername"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                                    <input type="text" id="pwd" class="form-control" placeholder="Enter password">
                                                    <img id="myImg2" src="" height="20" width="20" alt="">
                                                    <p id="mypwd"></p>
                                                </div>
                                                <button type="button" onclick="myFunction()" class="btn btn-outline-secondary btn-block">Login</button>
                                            </form>
                                            <form role="form" id="vsand" class="show wow bounceIn">
                                                <h4><span id="" class="glyphicon glyphicon-lock"></span>  Login As Vsand</h4>
                                                <div class="form-group">
                                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                                    <input type="text" id="username" class="form-control" placeholder="Enter email">
                                                    <img id="myImg" src="" height="20" width="20" alt="">
                                                    <p id="myusername"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                                    <input type="text" id="pwd" class="form-control" placeholder="Enter password">
                                                    <img id="myImg2" src="" height="20" width="20" alt="">
                                                    <p id="mypwd"></p>
                                                </div>
                                                <button type="button" onclick="myFunction()" class="btn btn-outline-secondary btn-block">Login</button>
                                            </form>
                                            <form role="form" id="masnod" class="show wow bounceIn">
                                                <h4><span id="" class="glyphicon glyphicon-lock"></span>  Login As Masnod</h4>
                                                <div class="form-group">
                                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                                    <input type="text" id="username" class="form-control" placeholder="Enter email">
                                                    <img id="myImg" src="" height="20" width="20" alt="">
                                                    <p id="myusername"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                                    <input type="text" id="pwd" class="form-control" placeholder="Enter password">
                                                    <img id="myImg2" src="" height="20" width="20" alt="">
                                                    <p id="mypwd"></p>
                                                </div>
                                                <button type="button" onclick="myFunction()" class="btn btn-outline-secondary btn-block">Login</button>
                                            </form>
                                            <form role="form" id="vmasnod" class="show wow bounceIn">
                                                <h4><span id="" class="glyphicon glyphicon-lock"></span>  Login As Vmasnod</h4>
                                                <div class="form-group">
                                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                                    <input type="text" id="username" class="form-control" placeholder="Enter email">
                                                    <img id="myImg" src="" height="20" width="20" alt="">
                                                    <p id="myusername"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                                    <input type="text" id="pwd" class="form-control" placeholder="Enter password">
                                                    <img id="myImg2" src="" height="20" width="20" alt="">
                                                    <p id="mypwd"></p>
                                                </div>
                                                <button type="button" onclick="myFunction()" class="btn btn-outline-secondary btn-block">Login</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-dark btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                            <p>Not a member? <a href="#">Sign Up</a></p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Register<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="../Sand Register/Sand Register.html">Sign Up Sand</a></li>
                                    <li><a href="#">Sign Up Masnod</a></li>
                                    <li><a href="#">Sign Up Vsand</a></li>
                                    <li><a href="#">Sign Up Vmasnod</a></li>
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




                <nav class="navbar navbar-inverse">
                        <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#axit-nav" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="axit-nav">
                                <ul class="nav navbar-nav text-center">
                                    <li class="active"><a href="#">home</a></li>
                                    <li><a href="#">download applecation</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">SERVICES</a></li>
                                    <li><a href="#">Contact </a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                        </nav>

                         <!-- End section navbar -->


                <!-- Start section masnod regester -->
                <div class="Vsand">
                    <div class="overlay">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <h2 class="h1 text-left">ESND</h2>
                                    <p class="text-left">We're more than just a blog! Our online software helps marketers turn analytics into insights that guide decision-making and growth.</p>
                                </div>
                                <div class="col-md-5">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3 class="text-left">Vmasand Register</h3>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <label class="lable col-md-3 control-lable">Name</label>
                                        <div class="col-md-9">
                                            <input type="Name" class="form-control" name="Name" placeholder="Name">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <label class="lable col-md-3 control-lable">Governorate</label>
                                        <div class="col-md-9">
                                            <input type="Governorate" class="form-control" name="Governorate" placeholder="Governorate">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="lable col-md-3 control-lable">Address</label>
                                        <div class="col-md-9">
                                            <input type="Address" class="form-control" name="Address" placeholder="Address">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="lable col-md-3 control-lable">Telephone</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="Telephone" placeholder="Telephone">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="lable col-md-3 control-lable">Social id</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="Social id" placeholder="Social id">
                                        </div>
                                    </div>

                                    <div class="row">
                                            <label class="lable col-md-3 control-lable">Password</label>
                                            <div class="col-md-9">
                                                <input type="Password" class="form-control" name="Password" placeholder="Password">
                                                <input type="checkbox"> <small>Remember Me</small>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="lable col-md-3 control-lable">Confirm Password
                                                </label>
                                            <div class="col-md-9">
                                                <input type="Password" class="form-control" name="Confirm Password
                                                " placeholder="Confirm Password
                                                ">
                                            </div>
                                        </div>
                                        <a href="#"><div class="btn btn-info">Register</div></a>
                                        <a href="#"><div class="btn btn-warning">cancel</div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Start section footer -->

                <div class="footer">
                        <div class="overlay">
                            <div class="footer-links">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <h2>CONTACT US</h2>
                                            <ul>
                                                <li><i class="fa fa-phone"></i><span> Telephone :</span> +00 (123) 456 7890</li>
                                                <li><i class="fa fa-envelope-o color"></i><span> E-mail :</span> info@domain.com</li>
                                            </ul>
                                            <P>Subscribe</P>
                                            <button>Send</button>
                                            <input type="text" placeholder=" Type your email address">
                                            <h2 class="desc-img">Now available on</h2>
                                            <img src="images/store play.png">
                                            <img src="images/app store.png">
                                        </div>
                                        <div class="col-lg-2 text-center">
                                            <h2>LINKS</h2>
                                            <ul class="links">
                                                <li><a>SIGN UP</a></li>
                                                <li><a>LOGIN</a></li>
                                                <li><a hraf="page-scroll">Download The App</a></li>
                                                <li><a href="#header">HOME</a></li>
                                                <li><a href="#about">ABOUT</a></li>
                                                <li><a href="#header">SERVICES</a></li>
                                                <li><a href="#about">CONTACT</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3">
                                            <h2 class="follow">FOLLOW US</h2>
                                            <i class="fa fa-facebook-square fa-3x"></i>
                                            <i class="fa fa-twitter-square fa-3x"></i>
                                            <i class="fa fa-instagram fa-3x"></i>
                                            <i class="fa fa-youtube-square fa-3x"></i>
                                        </div>
                                        <div class="col-lg-3 text-center">
                                            <h2>ESND</h2>
                                            <p class="desc">We're more than just a blog! Our online software helps marketers turn analytics into insights that guide decision-making and growth. </p>
                                            <hr>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- End section footer -->

        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/custom.js')}}"></script>
    </body>
</html>
