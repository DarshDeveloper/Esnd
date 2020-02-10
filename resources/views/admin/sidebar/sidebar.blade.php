 <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li>
                <a class="" href="{{ url('/masnodslist')}}">
                    <i class="icon_genius"></i>
                    <span>Masnods</span>
                </a>
            </li>
          <li>
            <a data-toggle="collapse" href="#vmasnods">
                          <i class="icon_desktop"></i>
                          <span>VMasnods</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul id="vmasnods" class="collapse">
              <li><a class="" href="{{ url('/vmasnodslist')}}">VMasnods List</a></li>
              <li><a class="" href="{{ url('/vmasnod/register') }}">Add VMasnod</a></li>
            </ul>
          </li>
            <li>
            <a href="{{ url('/sandslist')}}" class="">
            <i class="icon_document_alt"></i>
            <span> Sands </span>
            </a>
            </li>

          <li>
            <a data-toggle="collapse" href="#vsands">
                          <i class="icon_table"></i>
                          <span>Vsands</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul id="vsands" class="collapse">
              <li><a class="" href="{{ url('/vsandslist')}}">Vsands List</a></li>
                <li><a class="" href="{{ url('/vsand/register') }}">Add Vsand</a></li>
            </ul>
          </li>

            <li>
                <a  data-toggle="collapse" href="#p_requests">
                    <i class="icon_desktop"></i>
                    <span>Pending Requests</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul id="p_requests" class="collapse">
                    <li><a class="" href="{{ url('/mrequests')}}">Masnod Requests</a></li>
                    <li><a class="" href="{{ url('/vmrequests') }}">Vmasnod Requests</a></li>
                    <li><a class="" href="{{ url('/vsrequests') }}">Vsand Requests</a></li>
                    <li><a class="" href="{{ url('/srequests') }}">Sand Requests</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ url('/drequests')}}" class="">
                    <i class="icon_document_alt"></i>
                    <span> Done Requests </span>
                </a>
            </li>
            <li>
                <a  data-toggle="collapse" href="#escalations">
                    <i class="icon_desktop"></i>
                    <span> Escalations </span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul  id="escalations" class="collapse">
                    <li><a class="" href="{{ url('/m_esc')}}">Masnod Escalation</a></li>
                    <!-- {{--<li><a class="" href="{{ url('/s_esc') }}">Sand Escalation</a></li>--}} -->
                    <li><a class="" href="{{ url('/r_esc') }}">Requests Escalation</a></li>
                </ul>
            </li>
            <li>
                <a  data-toggle="collapse" href="#hold">
                    <i class="icon_desktop"></i>
                    <span> Hold </span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul  id="hold" class="collapse">
                    <li><a class="" href="{{ url('/m_hold')}}">Masnod Verification Hold</a></li>
                    <li><a class="" href="{{ url('/m_req_hold') }}">Masnod Request Hold</a></li>
                    <li><a class="" href="{{ url('/s_req_hold') }}">Sand Request Hold</a></li>
                </ul>
            </li>
            <li>
            <a href="{{ url('/paymentlist')}}" class="">
            <i class="icon_document_alt"></i>
            <span> payment </span>
            </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
