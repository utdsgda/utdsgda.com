@extends('layouts.default-with-tracking')

@section('bodyClass', 'election-results')

@section('content')

<section class="container">
  <h1>Election Results</h1>
  <h2>{{ $election->name }}</h2>

  @if (!$electionOver)
    <div class="alert alert-info">
      This election is still underway until <strong>{{ $election->end_date }}</strong>
    </div>

  @else
	<ul class="list-group">
    	@foreach ($pollResults as $pollResult)
    	<li class="list-group-item @if ($loop->first) active @endif">
      		<span class="badge">{{ $pollResult['votes'] }} {{ $pollResult['votes'] > 1 ? 'Votes' : 'Vote' }}</span>
      		{{ $pollResult['text'] }}
    	</li>
    	@endforeach
  	</ul>
@endif

 </section>
@endsection
