@extends('layouts.default-with-tracking')

@section('bodyClass', 'election-results')

@section('content')

<section class="container">
  <h1>Election Results</h1>
  <h2>Select an election</h2>

  <ul class="list-group">
    @foreach ($elections as $election)
    <a class="list-group-item" href="/election-results/{{ $election->id }}">
      {{ $election->name }}
    </a>
    @endforeach
  </ul>
 </section>
@endsection
