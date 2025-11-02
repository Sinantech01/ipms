@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
  <h1 class="text-success">Payment Successful</h1>
  <p>Your payment has been processed successfully. Thank you!</p>
  <a href="{{ url('/') }}" class="btn btn-primary">Go to Dashboard</a>
</div>
@endsection
