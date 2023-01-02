@extends('layout.main')
@section('main')
<div id="wrapper" class="flex flex-col mt-32">
 <div class="flex space-x-96 ml-10">
  <div class="flex flex-col"> 
   <h3 class="text-2xl font-bold">My Orders</h3>
   <h3 class="text-gray-400 text-xl">Find your orders Or Return Products</h3>
  </div>
  <div class="flex items-center">
   <input type="text" placeholder="Search Order History" class="px-2 py-2 bg-gray-100 border-2 border-gray-400 text-gray-400 rounded-l-lg h-10 w-96"/>
   <button class="bg-blue-500 text-white font-bold px-2 rounded-r-lg h-10">Search</button>
  </div>
 </div>
  
 <x-historyItem/>
 <x-historyItem/>
 <x-historyItem/>
 <x-historyItem/>

 </div>

@endsection