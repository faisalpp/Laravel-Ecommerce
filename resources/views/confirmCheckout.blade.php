@extends('layout.main')
@push('title')
    <title>Confirm Order</title>
@endpush
@section('main')
@php
  $total=0;
  $subtotal = 0;
  $item_subtotal=0;
  $shipping_price = $shipping->first()->shipping_price;
@endphp
<form id="form" action="{{url('/order')}}" method="post" class="flex w-full h-full border-t-2">
 <div class="flex flex-col px-10 w-1/2 mt-10 ml-10 mb-10">  
  <div class="flex flex-col border-2 px-5 border-gray-400 rounded-lg h-fit">
   <div class="flex justify-center items-center py-5 border-b-2 border-gray-400"><h3 class="text-gray-400">Contact</h3><p class="w-96 text-gray-600 ml-10">{{session()->get('user')['email']}}</p><a href="{{url('/view/checkout')}}" class="text-xs text-black">Change</a></div>
   <div class="flex justify-center py-5 items-center"><h3 class="text-gray-400">Ship To</h3><p class="text-gray-600 w-96 ml-10">{{session()->get('order_address')['address']}}, {{session()->get('order_address')['city']}} {{session()->get('order_address')['postal_code']}}, {{session()->get('order_address')['country']}}</p><a href="{{url('/view/checkout')}}" class="text-xs text-black">Change</a></div>
   <div class="flex justify-center items-center py-5 border-t-2 border-gray-400"><h3 class="text-gray-400">Method</h3><p class="w-96 text-gray-600 ml-10">Home Delivery</p><h3 class="text-xs text-black">${{$shipping_price}}</h3></div>
  </div>
  <div class="mt-10">
   <h3 class="text-xl font-semibold mb-2">Payment Method</h3>
  <div class="flex border-2 px-5 border-gray-400 space-x-10 rounded-lg h-fit w-fit">
   <div class="flex flex-col py-5">
    <div class="flex items-center border-b-2 border-gray-500 py-2"><i class="fa-solid fa-home text-blue-500 text-xl mr-5"></i><h3 class="text-gray-600">Cash On Delivery</h3></div>
    <div class="flex items-center py-2"><i class="fa-solid fa-credit-card text-xl text-blue-500 mr-5"></i><h3 class="text-gray-600">Credit Card</h3></div>
   </div>
   <div class="flex flex-col justify-center space-y-5">
    @csrf
    <input name="shipping_price" type="hidden" value="{{$shipping_price}}"/> 
    <div class="flex py-2"><input checked name="payment_type" type="checkbox" onchange="onlyOne(this)" value="Home Delivery"/></div>
    <div class="flex py-2"><input name="payment_type" type="checkbox" onchange="onlyOne(this)" value="Credit Card"/></div>
   </div>
  </div>
  </div>
  <div class="flex mt-10">
   <a href="{{url('/checkout')}}" class="font-bold px-5 py-4"><i class="fa-solid fa-angle-left"></i> Return To Information</a>
   <button onclick="document.getElementById('form').submit();" class="ml-52 bg-black rounded-lg text-white font-bold px-5 py-4">Confirm Order</button>
  </div>
 </div>

<div class="w-1/2 border-l-2">
@if(session('cart'))
  @foreach (session()->get('cart') as $product_id=>$product)
 <div class="flex items-center px-10 py-5 mt-10">
 <div><img src="{{asset('/storage/images/product')}}/{{$product['image']}}" class="w-20 h-20 rounded-lg"/></div>
  <div class="flex flex-col ml-3">
  <h3 class="font-semibold">{{$product['name']}}</h3>
  <h3 class="text-gray-500">{{$product['quantity']}} x ${{$product['price']}}</h3>
  </div>
  @php
    $item_subtotal = $product['quantity'] * $product['price'];
    $subtotal += $item_subtotal;
  @endphp
  <h3 class="ml-80 font-semibold">${{$item_subtotal}}</h3>
 </div>
  @endforeach
@endif
<div class="flex space-y-3 border-t-2 border-b-2 items-center space-x-80 text-md px-10 py-10">
 <div class="flex flex-col items-center text-gray-600"><h3>Subtotal</h3><h3>Shipping</h3></div>
 <div class="flex flex-col items-center text-gray-600"><h3 class="text-black font-semibold">${{$subtotal}}</h3><h3>${{$shipping_price}}</h3></div>
</div>
<div class="flex flex-col space-y-3 items-center border-b-2 py-10">
 <div class="flex space-x-96 items-center text-gray-600 text-xl"><h3>Total</h3><h3 class="text-black font-semibold">${{$total = $subtotal + $shipping_price}}</h3></div>
  <input name="total" type="hidden" value="{{$total}}"/> 
</div>
</div>
</form>
@endsection