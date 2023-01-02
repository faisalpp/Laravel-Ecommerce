<a href="{{url('/product')}}/{{$product->product_id}}"><div class="flex flex-col mb-20 w-fit"> 
  @csrf 
  <div><img src="{{asset('/storage/images/product')}}/{{$product->image}}" class="rounded-lg w-60 h-80 hover:scale-90"/></div>
  <div class="flex flex-col space-y-3 mt-5 w-fit"> 
  <div class="flex space-x-12 items-center w-fit"><h3 class="text-xl font-bold">{{$product->name}}</h3><h3 class="text-xl text-blue-500 font-bold">${{$product->price}}</h3></div>
  <p class="text-md font-bold w-60 h-10 ">{{$product->desc}}</p>
  <a href="{{url('/add-to-cart')}}/{{$product->product_id}}" class="text-xl text-center text-white font-bold hover:bg-blue-400 rounded-lg bg-blue-500 py-2">Add To Cart</a>
  </div>
</div></a>