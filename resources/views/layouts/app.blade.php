<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <link href="{{asset('vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('vendor/nouislider/nouislider.min.css')}}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body class="vh-100">
<div id="preloader">
    <div class="waviy">
        <div class="text-center mb-3">
            <a href="index.html"><img src="{{asset('images/Logo.jpg')}}" alt="" height="250"></a>
        </div>
        <span style="--i:1">L</span><span style="--i:2">o</span><span style="--i:3">a</span><span style="--i:4">d</span><span style="--i:5">i</span>
        <span style="--i:6">n</span><span style="--i:7">g</span><span style="--i:8">.</span><span style="--i:9">.</span><span style="--i:10">.</span>
    </div>
</div>
    @guest
        @yield('content')
    @else
    <div id="main-wrapper">
        @include('layouts.partials.navheader')
        @include('layouts.partials.sidebar')
            @yield('content')
        @include('layouts.partials.footer')
    </div>
    @endguest

    <!-- Required vendors -->
    <script src="{{asset('vendor/global/global.min.js')}}"></script>
	<script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<script src="{{asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
	
	<!-- Apex Chart -->
	<script src="{{asset('vendor/apexchart/apexchart.js')}}"></script>
	<script src="{{asset('vendor/nouislider/nouislider.min.js')}}"></script>
	<script src="{{asset('vendor/wnumb/wNumb.js')}}"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{asset('js/dashboard/dashboard-1.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
	<script src="{{asset('js/dlabnav-init.js')}}"></script>
	<script src="{{asset('js/demo.js')}}"></script>
</body>
</html>
