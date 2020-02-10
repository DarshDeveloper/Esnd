<header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="" class="logo"><img src="/img/3.png" class="imglogo"></a>
      <!--logo end-->


    @if (!Auth::guest())
      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- inbox notificatoin start-->
            <li class="dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                   style="position:relative; padding-left: 50px;">
                    {{--<img src="/uploads/avatars/{{ Auth::user()->avatar }}"
                             style="width: 32px; height: 32px; position: absolute; top: 10px; left: 10px; border-radius: 50%">--}}
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu extended logout">--}}
                    <div class="log-arrow-up"></div>
                    <li class="eborder-top">
                        
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                            <i class="icon_key_alt"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>

            </ul>


          <!-- user login dropdown end -->

        <!-- notificatoin dropdown end-->
      </div>
        @endif
    </header>
