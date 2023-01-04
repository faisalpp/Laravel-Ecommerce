@extends('layout.main')
@section('main')
  <h1>Dear {{$customerDetails->name}} your is Complete and Deliver on Time!</h1>
  <h2>Address:</h2>
  <p>{{$customerDetails->address->line1}}</p>
  <a>Go to Home</a>
  <h2>Shop More</h2>
@endsection