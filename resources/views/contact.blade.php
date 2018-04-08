@extends('layouts.default-with-tracking')

@section('content')
<section class="container">
  <h1>How to get (and stay) in touch</h1>

  <hr>

  <h2>Email</h2>
  <p class="lead">Want to drop us a line? Just send it this way</p>
  <a class="btn btn-sgda" href="mailto:hello@utdsgda.com"><i class="fa fa-envelope-o"></i> hello@utdsgda.com</a>
  <hr>

  <h2>Newsletter</h2>
  <p class="lead">You can get our awesome, beautiful newsletter delivered right to your email inbox.</p>
  <p><a class="btn btn-sgda" href="{{ route('special::newsletter') }}"><i class="fa fa-arrow-circle-right"></i> Subscribe now!</a></p>

  <hr>

  <h2>Social Media</h2>
  <p class="lead">You can find us hanging around these sites</p>
  <p><a class="btn btn-sgda" href="{{ route('social::facebook') }}"><i class="fa fa-facebook"></i>&nbsp;&nbsp; UTDSGDA on Facebook</a></p>
  <p><a class="btn btn-sgda" href="{{ route('social::twitter') }}"><i class="fa fa-twitter"></i>&nbsp; @thesgda on Twitter</a></p>
  <p><a class="btn btn-sgda" href="{{ route('social::discord') }}"><img src="{{ asset("assets/images/SGDADiscoNoBorder.png") }}" style="width:20px;height:20px;"/>&nbsp; &nbsp; Our Discord Channel</a></p>
 <!-- <p><a class="btn btn-sgda" href="{{ route('social::steam') }}"><i class="fa fa-steam"></i>&nbsp; Our Steam Community</a></p>-->
</section>
@endsection
