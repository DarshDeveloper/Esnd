
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title> Dashboard </title>

<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />

<link rel="stylesheet" href="{{asset('css/bootstrap-theme.css')}}" />
<link rel="stylesheet" href="{{asset('css/elegant-icons-style.css')}}" />
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('assets/fullcalendar/fullcalendar/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" />
<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" />
<link rel="stylesheet" href="{{asset('css/jquery-jvectormap-1.2.2.css')}}" />
<link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('css/widgets.css')}}" />
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
<link rel="stylesheet" href="{{asset('css/style-responsive.css')}}" />
<link rel="stylesheet" href="{{asset('css/xcharts.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/jquery-ui-1.10.4.min.css')}}" />
<!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
@include('admin.header.header')
@include('admin.sidebar.sidebar')

<div class="container">
<section>

    @yield('content')


    {{--@include('sand')--}}
    {{--@if(Auth::guard('admin')->check())--}}
    {{--@include('admin.header.header')--}}
    {{--@include('admin.sidebar.sidebar')--}}
{{--    @yield('content')--}}
    {{--@else--}}
    {{--@yield('content')--}}
    {{--@endif--}}
</section>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <!-- <script src="{{asset('js/jquery.js')}}"></script> -->
 <!-- <script src="{{asset('js/jquery-ui-1.10.4.min.js')}}" ></script> -->
<!-- <script src="{{asset('js/jquery-1.8.3.min.js')}}"></script> -->
 <!-- <script src="{{asset('js/jquery-ui-1.9.2.custom.min.js')}}" ></script> -->
<!-- <script src="{{asset('js/bootstrap.min.js')}}" ></script> -->

<script src="{{asset('js/jquery.scrollTo.min.js')}}" ></script>
<script src="{{asset('js/jquery.nicescroll.js')}}" ></script>
<script src="{{asset('assets/jquery-knob/js/jquery.knob.js')}}"></script>
<script src="{{asset('js/jquery.sparkline.js')}}" ></script>
<script src="{{asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}" ></script>

<script src="{{asset('js/owl.carousel.js')}}" ></script>
<script src="{{asset('js/fullcalendar.min.js')}}" ></script>
<script src="{{asset('assets/fullcalendar/fullcalendar/fullcalendar.js')}}" ></script>




<script src="{{asset('js/calendar-custom.js')}}"></script>
<script src="{{asset('js/jquery.customSelect.min.js')}}"></script>
<script src="{{asset('assets/chart-master/Chart.js')}}" ></script>
<script src="{{asset('js/scripts.js')}}" ></script>
<script src="{{asset('js/sparkline-chart.js')}}" ></script>
<script src="{{asset('js/easy-pie-chart.js')}}" ></script>
<script src="{{asset('js/jquery-jvectormap-1.2.2.min.js')}}" ></script>
<script src="{{asset('js/jquery-jvectormap-world-mill-en.js')}}" ></script>
<script src="{{asset('js/xcharts.min.js')}}" ></script>
<script src="{{asset('js/jquery.autosize.min.js')}}" ></script>
<script src="{{asset('js/jquery.placeholder.min.js')}}" ></script>
<script src="{{asset('js/gdp-data.js')}}"></script>
<script src="{{asset('js/morris.min.js')}}" ></script>
<script src="{{asset('js/sparklines.js')}}" ></script>
<script src="{{asset('js/charts.js')}}" ></script>
<script src="{{asset('js/jquery.slimscroll.min.js')}}" ></script>
</body>
</html>
