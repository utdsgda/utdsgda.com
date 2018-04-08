@extends('layouts.default-with-tracking')

@section('bodyClass', 'vote')

@section('content')

<section class="container">
  <h1>{{ $election->name }}</h1>

  @if ($isValid)
      <h2>Cast your ballot!</h2>

      <form method="post" action="/vote" class="vote-form">
        @csrf

        <div class="form-group">
        @foreach ($pollOptions as $pollOption)
          <div class="radio">
            <input type="radio" name="pollOptionId" id="pollOption{{ $pollOption->id }}" value="{{ $pollOption->id }}" />
            <label for="pollOption{{ $pollOption->id }}">{{ $pollOption->text }}</label>
          </div>
        @endforeach
        </div>

        <input type="hidden" name="electionId" value="{{ $election->id }}" />
        <input type="hidden" name="voteCode" value="{{ $voteCode }}" />
        <button class="btn btn-info" type="submit">Submit Vote &raquo;</button>
      </form>
  @else
    <h2>{{ $statusMessage }}</h2>
  @endif
 </section>
@endsection
