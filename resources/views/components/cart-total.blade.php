{{-- 4th Element --}}
<div class="flex w-full justify-end border-t-2 border-gray-300">
 
 <div class="flex flex-col px-10 mt-10">  

 <div class="flex flex-col mr-20 border-b-2 border-gray-400">  
  
  <div class="flex items-center text-3xl">
    <h3>Shipping</h3>
    <h3 class="ml-60 text-sm">Calculated At Next Step</h3>
  </div>
  
  <div class="flex items-center text-3xl">
    <h3>Subtotal</h3>
    <h3 class="ml-60">{{$total}}</h3>
  </div>
 </div>
<div class="flex text-3xl font-bold mt-5">
 <h3>Total</h3>
 <h3 class="ml-72">${{$total}}</h3>
</div>
</div>
</div>