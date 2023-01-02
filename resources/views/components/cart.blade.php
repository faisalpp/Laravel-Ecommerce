<div id="cart" class="absolute top-32 -right-1 border-2 border-gray-500 rounded-xl bg-white text-blue-500 w-96 h-auto px-5">
 <h3 class="text-blue-500 font-bold text-2xl text-center mt-3">Cart</h3>      
   {{-- @foreach ($products as $product)   
  <div class="flex items-center space-x-20 mt-8 border-b-2 border-gray-300 py-2">
   <img src="{{asset('storage/images/product/'.$product->image)}}" class="w-16 h-16 rounded-lg"/>
   <div class="flex border-2 border-gray-300 rounded-lg space-x-2 px-2"><button onclick="decrement()" class="border-r-2"><i class="fa-solid fa-chevron-left"></i></button><input id="item_value" value="1" type="text" class="w-2" /><button onclick="increment()" class="border-l-2"><i class="fa-solid fa-chevron-right"></i></button></div>
   <h3>${{$product->price}}</h3>
  </div>
 @endforeach --}}
 <div class="flex flex-col space-y-5 mt-10 mb-5 text-xl text-black font-bold">
  <div class="flex space-x-52">
   <h3>Subtotal:</h3><h3>$100<h3>
  </div>
  <div class="flex space-x-52">
   <h3>Shipping:</h3><h3>$10<h3>
  </div>
  <div class="flex space-x-60">
   <h3>Total:</h3><h3>$110<h3>
  </div>
  <button class="bg-blue-500 text-white font-bold text-xl px-2 py-2 mt-2">PROCEED TO CHECKOUT</button>
 </div>
</div>