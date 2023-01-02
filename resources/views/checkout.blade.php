@extends('layout.main')
@section('main')

<div class="flex w-full h-full border-t-2">
 
 <div class="flex flex-col px-10 w-1/2 mt-10 ml-10 mb-10">
  <form action="{{url('/change-address')}}" method="post" class="flex flex-col space-y-5"> 
    @csrf
    @if($addresses)
   <select name="user_address_id" onchange="this.form.submit();" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
    <option>Select Address</option>
    @foreach ($addresses as $address)
    <option value="{{$address->user_address_id}}" >{{$address->address}}</option>  
    @endforeach
   </select>
    @endif
  </form>
  <form action="{{url('/confirm-checkout')}}" method="post" class="flex flex-col space-y-5">
  @csrf
   <div class="form-group mb-6">
    <input name="user_id" type="hidden" value="{{session()->get('user')['user_id']}}" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Email">
   </div>
   <h3 class="text-xl font-bold">Shipping</h3>
   <div class="grid grid-cols-2 gap-4">
   <div class="form-group mb-6">
    <input name="first_name" value="{{session('order_address') ? session()->get('order_address')['first_name'] : ''}}" type="text" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="First Name">
    @error('first_name')
    <h3 class="text-red-500">First Name Required</h3>
    @enderror
   </div>
     <div class="form-group mb-6">
      <input name="last_name" value="{{session('order_address') ? session()->get('order_address')['last_name'] : ''}}" type="text" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Last Name">
      @error('last_name')
        <h3 class="text-red-500">Last Name Required</h3>
      @enderror
     </div>
    </div>
  <div class="grid grid-cols-2 gap-4">
   <div class="form-group mb-6">
    <input name="country" value="{{session('order_address') ? session()->get('order_address')['country'] : ''}}" type="text" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Country">
    @error('country')
    <h3 class="text-red-500">Country Required</h3>
    @enderror
   </div>
     <div class="form-group mb-6">
      <input name="phone" value="{{session('order_address') ? session()->get('order_address')['phone'] : ''}}" type="text" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Phone">
      @error('phone')
        <h3 class="text-red-500">Phone Required</h3>
      @enderror
     </div>
    </div>
    <div class="form-group mb-6">
     <input name="address" value="{{session('order_address') ? session()->get('order_address')['address'] : ''}}" type="text" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Address">
     @error('address')
     <h3 class="text-red-500">Address Required</h3>
     @enderror
    </div>
      <div class="grid grid-cols-2 gap-4">
   <div class="form-group mb-6">
    <input name="city" value="{{session('order_address') ? session()->get('order_address')['city'] : ''}}" type="text" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="City">
    @error('city')
    <h3 class="text-red-500">City Required</h3>
    @enderror
   </div>
     <div class="form-group mb-6">
      <input name="postal_code" value="{{session('order_address') ? session()->get('order_address')['postal_code'] : ''}}" type="text" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Postal Code">
      @error('postal_code')
        <h3 class="text-red-500">Postal Code Required</h3>
      @enderror
     </div>
    </div>
   <div class="flex space-x-52">  
    <a href="{{url('/view/cart')}}" class="w-fit px-6 py-2.5 text-gray-600  text-xl transition duration-150 ease-in-out  cursor-pointer"><i class="fa-solid fa-angle-left font-bold"></i> Return to Cart</a>
    <button class="w-fit px-6 py-2.5 bg-blue-600 text-white font-bold text-xl leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg cursor-pointer focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Continue</button>
   </div>
  </form>
 </div>

<div class="w-1/2 border-l-2">
 
@php
  $total = 0;
  $subtotal = 0;
  $item_subtotal = 0;
@endphp
@if (session('cart'))
  @foreach (session()->get('cart') as $product_id=>$product)
 <div class="flex items-center px-10 py-5 mt-10">
  <img src="{{asset('/storage/images/product')}}/{{$product['image']}}" class=" w-20 h-20 rounded-lg"/>
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
 <div class="flex flex-col items-center text-gray-600"><h3 class="text-black font-semibold">${{$subtotal}}</h3><h3>Calculated at Next Step</h3></div>
</div>
<div class="flex flex-col space-y-3 items-center border-b-2 py-10">
 <div class="flex space-x-96 items-center text-gray-600 text-xl"><h3>Total</h3><h3 class="text-black font-semibold">${{$total +=$subtotal}}</h3></div>
</div>
</div>
</div>

@endsection