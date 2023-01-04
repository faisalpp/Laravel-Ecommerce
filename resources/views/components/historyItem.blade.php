  <div class="flex flex-col shadow-xl rounded-lg mt-10 mb-20 ml-10 mr-10">
   <div class="flex bg-gray-200 rounded-t-lg items-center px-5 py-5 space-x-10">
    <div id="order-details" class="flex flex-col border-r-2 border-gray-400 px-32">
     <h3 class="text-gray-500 text-xl">Order Number</h3>
     <h3 class="font-bold text-lg text-center">{{$orderId}}</h3>
    </div>
    <div id="order-details" class="flex flex-col border-r-2 border-gray-400 px-32">
     <h3 class="text-gray-500 text-xl">Order Date</h3>
     <h3 class="font-bold text-lg">{{date_format($createdAt,"d M Y");}}</h3>
    </div>
    <div id="order-details" class="flex flex-col justify-center px-32">
     <h3 class="text-gray-500 text-xl">Total Amount</h3>
     <h3 class="font-bold text-lg text-center">${{$total}}</h3>
    </div>
   </div>
   <div class="grid grid-flow-row-dense">
    @foreach ($products as $product_id=>$product)
    <x-historyCard :productId='$product_id' :name="$product['name']" :price="$product['price']" :quantity="$product['quantity']"/>
    @endforeach

   </div>
  </div>

   <div class="flex border-t-2 border-gary-400 mt-10">
    <div class="flex justify-center text-lg font-bold text-blue-500 hover:bg-blue-500 hover:text-white px-10 py-10 rounded-l-lg w-full h-fit">Archive Order</div>
    <div class="flex justify-center text-lg font-bold text-blue-500 hover:bg-blue-500 hover:text-white px-10 py-10 w-full">Return</div>
    <div class="flex justify-center text-lg font-bold text-blue-500 hover:bg-blue-500 hover:text-white px-10 py-10 w-full">View Invoice</div>
    <div class="flex justify-center text-lg font-bold text-blue-500 hover:bg-blue-500 hover:text-white px-10 py-10 rounded-r-lg w-full">Write a Review</div>
   </div>

  </div>

   </div>
























