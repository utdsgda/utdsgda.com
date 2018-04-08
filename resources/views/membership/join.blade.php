@extends('layouts.default-with-tracking')

@section('content')
<section class="container">

  <div class="membership-comparison">

    <div class="membership-option">
      <div class="inner">
        <header>
          <h2 class="option-title">Yearly Membership</h2>
          <span class="price">$20</span>
        </header>

        <ul class="option-features">
          <p class="option-description">Opt-in newsletter + these things</p>
          <li class="feature">
            <h3 class="feature-title">T-Shirt</h3>
            <p class="feature-description">Awesome <strong>members-only</strong> shirt</p>
            <p class="feature-description">Chose from three designs</p>
          </li>
          <li class="feature">
            <h3 class="feature-title">Private Event</h3>
            <p class="feature-description">Come to an <strong>exclusive</strong> LAN Party</p>
            <p class="feature-description">Bring a guest for free</p>
          </li>
          <li class="feature">
            <h3 class="feature-title">Special Perks</h3>
            <p class="feature-description">Free energy drinks at all events</p>
            <p class="feature-description">Priority pizza access</p>
          </li>
        </ul>

        <div class="select-button">
          <a class="btn btn-sgda btn-green" href="{{ route('membership::purchase') }}">Join the SGDA</a>
        </div>
      </div>
    </div>

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
