@extends('layouts.default-with-tracking')

@section('bodyClass', 'home')

@section('content')
<!-- Hero -->
<section class="hero"></section>

<!-- Banner  
<section class="hero-description">
  <div class="container">
    <p class="lead">
     Register for Elections Now!!<a class="btn btn-sgda btn-inverse" href="{{ route('social::shirt') }}">Buy Here!</a>
    </p>
  </div>
</section>
-->



<!-- Primary CTAs -->
<section class="container intro-columns">
<!--  <div class="col-md-6">
    <div class="content-area">
      <header>
        <h2>Game Jams</h2>
      </header>
      <div class="clock">
        <div class="top"></div>
        <div class="right"></div>
        <div class="bottom"></div>
        <div class="left"></div>
        <div class="center"></div>
        <div class="hour"></div>
        <div class="minute"></div>
        <div class="second"></div>
      </div>
      <p>You have 48 hours to chug caffeine and build a game.</p>
      <p>Sound like fun?</p>
      <a class="btn btn-sgda" href="{{ route('events') }}"><i class="fa fa-arrow-circle-right"></i> Come to the next one</a>
    </div>
  </div>
-->


  <div class="col-md-6">
    <div class="content-area">
      <header>
        <h2>SGDA Elections!</h2>
      </header>
      <i class="fa fa-check-square-o hero-icon"></i>
      <p>Register for voting! We're also looking for people for next semester!</p>
      <a class="btn btn-sgda" href="https://utdsgda.com/apply"><i class="fa fa-arrow-circle-right"></i> Register Today!</a>
    </div>
  </div>



  <div class="col-md-6">
    <div class="content-area">
      <header>
        <h2>Email Newsletter</h2>
      </header>
      <i class="fa fa-envelope-o hero-icon"></i>
      <p>Stay up-to-date with our beautiful newsletter!</p>
      <p>Events, and news.</p>
      <a class="btn btn-sgda" href="{{ route('special::newsletter') }}"><i class="fa fa-arrow-circle-right"></i> Stay super informed</a>
    </div>
  </div>
</section>

<!-- Lead type -->
<section class="container intro">
  <p class="lead">The Student Game Developer Alliance represents and serves the ever growing number of UT Dallas students and alumni interested in game development for personal, commercial, and academic use.</p>
  <p class="lead">The SGDA is a community that unites these students of similar interest for social, educational, and professional advancement.</p>
</section>
@endsection
