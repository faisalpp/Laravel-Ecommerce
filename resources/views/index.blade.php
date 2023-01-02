@extends('layout.main')
@section('main')
<x-hero/>
 <div id="wrapper" class="flex flex-col w-full justify-center items-center">
   <div id="wrapper" class="flex flex-col w-full">
    <div id="item-grid" class="grid grid-cols-4 grid-rows-auto mt-10 mb-10 ml-10">
      @foreach($products as $product)  
       <div><x-product-card  :product="$product"/></div>
      @endforeach  
    </div>
  </div>
  <x-service/>
@endsection