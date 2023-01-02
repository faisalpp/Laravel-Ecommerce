@extends('layout.main')
@section('main')
@php
  $total = 0;
  $vat = 8;
@endphp
 <div class="grid grid-row-dense w-full">
  @if(session('cart'))
    @foreach (session('cart') as $product_id=>$product)
<div id="item" class="flex border-t-2 border-gray-300 px-10 py-10">
 
 <div class="grid grid-col-12 w-full">  
    
  {{-- First Element --}}
  <div class="col-start-1 col-end-3">
   <div class="flex space-x-10">
    <img src="{{asset('/storage/images/product')}}/{{$product['image']}}" class="h-60 w-48 rounded-md"/>
    <div class="flex flex-col space-y-12">
     <div class="flex flex-col space-y-5">
      <h3 class="font-bold text-xl">{{$product['name']}}</h3>
      <h3 class="text-gray-400 text-lg">Standard</h3>
     </div>
     <div class="flex flex-col mt-5 text-gray-500 text-lg space-y-2">
      <h3>Order Today</h3> 
      <h3>Delivery By Dec 4</h3>
      <h3>{{$product['quantity']}}</h3>
     </div>
    </div>
   </div>
  </div>
  
  @php
    $subtotal = $product['price'] * $product['quantity']; 
    $total += $subtotal;
  @endphp

  {{-- 2nd Element --}}
  <div class="col-start-5 col-end-6 flex items-center">
    <a href="{{url('/decrement-from-cart')}}/{{$product_id}}" class="border-2 border-gray-300 rounded-l px-2 text-gray-500"><i class="fa-solid fa-minus"></i></a><h3 class="text-gray-500 border-2 border-gray-300 w-20 text-center">{{$product['quantity']}}</h3><a href="{{url('/add-to-cart')}}/{{$product_id}}" class="border-2 border-gray-300 rounded-r px-2 text-gray-500"><i class="fa-solid fa-plus"></i></a>
  </div>

   {{--3rd Element  --}}
 
  <div class="col-start-10 flex items-center flex-col justify-center">
    <div class="flex space-x-2 items-center text-2xl font-bold"><h3>Price: </h3><h3>${{$product['price']}}</h3></div>
   <div class="flex space-x-2 items-center text-2xl font-bold"><h3>Subtotal: </h3><h3>${{$subtotal}}</h3></div>
    <h3 class="text-red-600 cursor-pointer text-sm font-bold hover:underline" >Remove</h3>
  </div>
 </div>
</div>
@endforeach
 </div>
<x-cart-total :total="$total"/>
</div>
<div class="flex space-x-5 mb-10 ml-10">
<a href="{{url('/')}}" class="bg-blue-500 text-white font-bold text-xl px-2 py-2 rounded-lg">Proceed Shopping</a>
<a href="{{url('/view/checkout')}}" class="bg-blue-500 text-white font-bold text-xl px-2 py-2 rounded-lg">Chekout</a>
</div>
@else
 <div class="flex items-center justify-center w-full h-full text-blue-500 text-2xl">
  <h3>Cart is Empty</h3>
 </div>
@endif
@endsection