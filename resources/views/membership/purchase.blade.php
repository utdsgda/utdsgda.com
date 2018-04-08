@extends('layouts.default-with-tracking')

@section('scripts_before_app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
  Stripe.setPublishableKey('{{ env('STRIPE_PUBLISH_KEY') }}');
</script>
@endsection

@section('content')
<section class="container">

  <div class="membership-purchase-react-container"></div>

</section>
@endsection
