@extends('layout.main')
@section('main')

@php
  $total = 0;
  $shipping = $order->first()->shipping;
@endphp
<div id="wrapper" class="flex flex-col mt-32 w-full">

 <div class="flex flex-col space-y-5 text-gray-600 ml-10 mb-10"> 
  <h3 class="text-xl">Thanks!</h3>
  <h3 class="text-4xl font-bold">Order Successful</h3>
  <h3 class="border-b-2 border-blue-500 text-xl font-bold w-fit">Your order is on the way. it'll be shipped today. we'll inform you.</h3>
  <div class="flex space-x-96 w-full">
   <h3 class="text-black text-xl font-bold">Order number: {{$order->id}}</h3>
   <div><button onclick="window.print();" class="bg-black hover:bg-black/80 text-white px-4 py-2 rounded-lg font-bold text-xl">Print Order Details</button></div>
  </div>
 </div>

 <div id="item-wrapper" class="flex flex-col border-2 border-gray-400 rounded-lg ml-10 mr-10 justify-center mb-20">
 @if (session('cart'))
  @foreach (session('cart') as $product_id => $product)    
  @php
    $subtotal = $product['quantity'] * $product['price'];
    $total += $subtotal;
  @endphp
  <x-product-success :image="$product['image']" :name="$product['name']" :price="$product['price']" :quantity="$product['quantity']"/>
  @endforeach
 @endif
 
 </div>
  
 <div class="flex ml-10 mb-20">
  
  <div class="grid grid-cols-12">

  <div class="col-start-1 col-end-4 flex flex-col space-y-5 text-xl">
   <h3 class="font-bold">Shipping Address</h3>
   <h3>{{session()->get('order_address')['address']}}</h3>
   <h3>{{session()->get('order_address')['city']}}</h3>
   <h3>{{session()->get('order_address')['phone']}}</h3>
  <div class="flex flex-col space-y-5">
   <h3 class="font-bold text-xl">Payment</h3>
   @if ($order->first()->payment_type == 'Credit Card')    
   <div class="flex space-x-10"><i class="fa-brands fa-cc-visa text-5xl text-blue-500"></i>
     <div class="flex flex-col space-y-2"><h3 class="font-bold">Visa Debit Card</h3><h3>**** **** **** 123</h3></div>
   </div>
   @else
   <div class="flex space-x-10"><i class="fa-solid fa-home text-5xl text-blue-500"></i>
     <div class="flex flex-col space-y-2"><h3 class="font-bold">Home Delivery</h3><h3>Cash at Door Step!</h3></div>
   </div>
   @endif
  </div>
  </div>

    <div class="col-start-7 flex space-x-96 px-2 py-5 ml-16 w-full">
     <div class="flex flex-col space-y-5">
      <h3 class="font-bold text-xl">Summery</h3>
      <div class="flex space-x-96 border-b-2 border-gray-400 py-5">
       <div class="text-xl">
        <h3>Subtotal</h3>
        <h3>Shipping</h3>
       </div>
       <div class="text-xl">
        <h3>${{$total}}</h3>
        <h3>${{$shipping}}</h3>
       </div>
      </div>
      <div class="flex font-bold text-xl space-x-96"><h3>Total</h3><h3>${{$total + $shipping}}</h3></div>
     </div>
    </div>

  </div>


 </div>

</div>

@endsection