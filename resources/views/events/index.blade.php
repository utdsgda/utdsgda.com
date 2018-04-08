@extends('layouts.default-with-tracking')

@section('content')
<section class="container">
  <h1>Events</h1>
  <p class="lead">Upcoming Events will be posted here!</p>
 <hr>
  <p class="lead">The SGDA hosts game development-related events</p>
  <p>Most of them are open to all UTD students who want to participate.</p>

  <hr>


  <hr>

  <h2>Game Jams</h2>
  <p class="lead">We host several weekend game jams, and typically one or two big game jams, throughout the semester.</p>
  <p><a href="{{ route('special::newsletter') }}">Subscribe to our newsletter</a> and <a href="{{ route('social::facebook') }}">follow us on Facebook</a> to get notified when we annouce these.</p>

  <hr>

  <h2>Industry Lectures</h2>
  <p class="lead">Each semester, the SGDA does its best to bring at least one speaker from the games industry to UTD.</p>
</section>
@endsection
