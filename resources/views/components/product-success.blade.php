<div class="flex mb-5 border-b-2 border-gray-400 last:border-none py-10 items-center space-x-[700px]">
   <div class="flex ml-5">
   <img src="{{asset('/storage/images/product')}}/{{$image}}" class="w-32 h-32 rounded-lg"/>
   <div class="flex flex-col space-y-2 mt-5 ml-5">
    <h3 class="font-bold text-xl">{{$name}}</h3>
    <h3 class="text-gray-400 text-md">Blue | Medium</h3>
    <h3 class="font-bold">Quantity {{$quantity}}</h3>
   </div>
   </div>
   <div><h3 class="font-bold text-2xl">${{$price}}</h3></div>
  </div>