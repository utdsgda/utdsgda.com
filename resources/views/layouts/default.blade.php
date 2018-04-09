<!DOCTYPE html>
<html lang="en">
<!--
░░░░░░░░░░░░░░░░░                                                      ░░░░░░░░░░░░░░░░░
░░░▄░▀▄░░░▄▀░▄░░░       __  ____________     _____ __________  ___     ░░░░░▀▄░░░▄▀░░░░░
░░░█▄███████▄█░░░      / / / /_  __/ __ \   / ___// ____/ __ \/   |    ░░░░▄█▀███▀█▄░░░░
░░░███▄███▄███░░░     / / / / / / / / / /   \__ \/ / __/ / / / /| |    ░░░█▀███████▀█░░░
░░░▀█████████▀░░░    / /_/ / / / / /_/ /   ___/ / /_/ / /_/ / ___ |    ░░░█░█▀▀▀▀▀█░█░░░
░░░░▄▀░░░░░▀▄░░░░    \____/ /_/ /_____/   /____/\____/_____/_/  |_|    ░░░░░░▀▀░▀▀░░░░░░
░░░░░░░░░░░░░░░░░                                                      ░░░░░░░░░░░░░░░░░
-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="@section('description', 'The Student Game Developer Alliance at the University of Texas at Dallas')">

  <title>@yield('title', 'UTD SGDA - Student Game Developer Alliance')</title>

  <link rel="shortcut icon" href="{{ asset("images/sgda-favicon.png") }}">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="/old-assets/css/sgda.min.css">
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,700,600,300">
  @yield('stylesheets')
</head>
<body class="@yield('bodyClass')">
  <nav class="navbar">
    <div class="container">
      <!-- Brand and toggle are grouped for better display on small screens -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="/old-assets/images/sgda-logo.png" alt="SGDA logo">
        </a>
      </div>

      <!-- Collapses into toggle on small screens -->
      <div class="collapse navbar-collapse" id="header-navbar-collapse">
        <ul class="nav navbar-nav">
        <li><a href="{{ route('events') }}">Events</a></li>
	<li><a href="{{ route('contact') }}">Contact Us</a></li>
	<li><a href="{{ route('blog') }}">Blog</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li class="social-link"><a href="{{ route('social::facebook') }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li class="social-link"><a href="{{ route('social::twitter') }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
          <li class="social-link"><a href="{{ route('social::discord') }}" target="_blank"><img src="/old-assets/images/SGDADiscoWBorder.png" alt="Join Our Discord!" style="width:25px;height:25px;"/></a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav>

  @yield('content')

  <footer>
    <div class="container">
      <div class="col-md-8 horizontal-centered text-centered">
        <a class="btn btn-sgda" href="mailto:hello@utdsgda.com"><i class="fa fa-envelope-o"></i> hello@utdsgda.com</a>
      </div>

      <div class="col-md-8 horizontal-centered text-centered">
        <p class="copyleft-notice"><i class="fa fa-copyright fa-flip-horizontal"></i>2015 Student Game Developer Alliance at UT Dallas</p>
      </div>

      @yield('attributionNotice')

      <div class="col-md-8 horizontal-centered text-centered">
        <p class="secondary license-text">Except where otherwise stated, the content of this site is licensed under a Creative Commons Attribution-ShareAlike 4.0 International License. You can <a href="https://creativecommons.org/licenses/by-sa/4.0/">read the terms of this license on the Creative Commons website</a>.</p>
      </div>

      <div class="col-md-8 horizontal-centered text-centered">
        <p class="secondary org-text">SDGA at UTD is a registered student organization and none of its materials are official publications of UT Dallas, nor do they represent the views of the University. UTD is an equal opportunity/affirmative action university.</p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  @yield('scripts_before_app')
  <script src="/old-assets/js/sgda.min.js"></script>
  @yield('scripts_after_app')
</body>
</html>
