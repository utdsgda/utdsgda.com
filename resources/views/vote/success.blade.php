@extends('layouts.default-with-tracking')

@section('bodyClass', 'vote')

@section('content')

<section class="container">
  <h1>Vote Cast!</h1>

  <p>Your vote for <strong>{{ $selectedPollOption->text }}</strong> in <strong>{{ $election->name }}</strong> has been recorded.</p>
 </section>
@endsection
