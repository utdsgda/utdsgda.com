@extends('layouts.default-with-tracking')

@section('content')
<section class="container">

  <div class="membership-comparison">

    <div class="membership-option">
      <div class="inner">
        <header>
          <h2 class="option-title">Newsletter Subscription</h2>
          <span class="price">Free</span>
        </header>

        <ul class="option-features">
          <li class="feature">
            <h3 class="feature-title">Newsletter</h3>
            <p class="feature-description">Our beautiful email newsletter</p>
            <p class="feature-description">Stay up to date with the SGDA</p>
          </li>
        </ul>

        <div class="select-button">
          <a class="btn btn-sgda btn-gray" href="{{ route('special::newsletter') }}">Subscribe</a>
        </div>
      </div>
    </div>

  </div>

</section>
@endsection
