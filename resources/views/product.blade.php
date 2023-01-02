@extends('layout.main')
@section('main')
<div id="main-wrapper" class="flex flex-col w-fit mt-24">
 
 <div id="product-info" class="flex w-full ml-10 mr-10 space-x-10">
  <x-productImg/>
  <div class="flex flex-col space-y-8"> 
   <h3 class="text-2xl font-bold">{{$product->first()->name}}</h3>
   <div class="flex space-x-52"><h3 class="text-blue-500 font-bold text-xl">${{$product->first()->price}}</h3><x-rating/></div>
    <div class="flex flex-col space-y-2">
    <h3 class="text-lg font-bold">Description:</h3>
    <p class="w-96">{{$product->first()->desc}}</p>
    </div>
    <div class="flex space-x-10"><x-dropdown name="Size" options="'LG"/>
    <x-dropdown name="Colors" options="black"/></div>
    <button class="bg-blue-500 rounded-md py-3 text-white font-bold text-lg w-96">Add to Cart</button>
    <x-policy/>
   </div>
  </div>
  
  <x-review/>
  <div class="flex flex-col ml-10 mr-10 w-full justify-center mt-20 mb-20">
   <h3 class="text-4xl font-bold mb-10">You may also like</h3>
   <div class="grid grid-cols-4 ">
     @foreach ($fproducts as $fproduct)  
      <x-product-card :image="$fproduct->image" :name="$fproduct->name" :desc="$fproduct->desc" :price="$fproduct->price"/>
     @endforeach   
   </div>
 </div>

</div>
@endsection