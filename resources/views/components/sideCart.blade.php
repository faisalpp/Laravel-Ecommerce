@php
    $total = 0;
@endphp
<div id="cart" style="display:none;" class="absolute z-10 bg-black/60 w-full h-full ">
 <div class="flex flex-col bg-gray-200 w-1/3 h-full ">

  <div class="flex flex-col mt-10 ml-10"> 
  <div class="flex space-x-60"><h3 class="font-bold ">SHOPPING CART:</h3><button onclick="document.getElementById('cart').style.display = 'none';"><i class="fa-solid fa-xmark text-lg"></i></button></div>
  {{--Cart Card  --}}
  @if(session('cart')) 
   @foreach (session('cart') as $product_id=>$product)    
   @php
      $subtotal = $product['quantity'] * $product['price'];
      $total += $subtotal;
   @endphp
  <div class="flex flex-col">
   <div class="grid grid-cols-12 mt-10 border-t-2 border-gray-400 py-5">
    <div class="col-start-1 col-end-3"><img src="{{asset('/storage/images/product')}}/{{$product['image']}}" class=" w-20 h-20 rounded-lg"/></div>
    <div class="col-start-3 col-end-6 flex flex-col ml-3">
     <h3 class="font-bold">{{$product['name']}}</h3>
     <h3 class="text-gray-600">1 Unit</h3>
     <h3 class="text-gray-600">{{$product['quantity']}} x <span class="text-black font-bold">${{$product['price']}}</span></h3>
    </div>
    <div class="col-start-11 flex text-gray-500 text-lg"><a href="{{url('/remove-cart-item')}}/{{$product_id}}" class="fa-solid fa-xmark"></a></div>
   </div>
  </div>
 @endforeach
 <div class="flex space-x-72 font-bold ml-10"><h3>Total:</h3><h3>${{$total}}</h3></div>
 <div class="flex flex-col space-y-5 w-full px-10 mt-10 text-white font-bold">
  <a href="{{url('/view/checkout')}}" class="bg-blue-500 py-2 rounded-lg text-center">CHECKOUT</a>
  <a href="{{url('/view/cart')}}" class="border-2 border-black py-2 text-center rounded-lg text-black ">VIEW CART</a>
 </div>
 @else
 <h3 class="text-center mt-20 text-blue-500 font-bold">Cart is Empty</h3>
 @endif
 </div>
 </div>
</div>