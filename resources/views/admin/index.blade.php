@extends('admin.layout.main')
@section('admin')
 <div class="flex flex-col w-full items-center">
  <h3 class="text-center text-4xl font-bold text-blue-500 mt-10">Welcome Back M.Faisal</h3>
  <div class="flex ml-10 mt-10 w-fits space-x-10">
   <div class="flex flex-col w-44 border-2 border-blue-500 rounded-xl space-y-3 px-5 py-5">
   <h3 class="text-2xl font-bold text-center">Categories</h3>
   <h3 class="text-xl text-center font-bold">{{$categories}}</h3>
   </div>
   <div class="flex flex-col border-2 w-44 border-blue-500 rounded-xl space-y-5 px-5 py-5">
   <h3 class="text-2xl font-bold text-center">Posts</h3>
   <h3 class="text-xl text-center font-bold">{{$products}}</h3>
   </div>
   <div class="flex flex-col border-2 w-44 border-blue-500 rounded-xl space-y-3 px-5 py-5">
   <h3 class="text-2xl font-bold text-center">Users</h3>
   <h3 class="text-xl text-center font-bold">{{$users}}</h3>
   </div>
  </div>
 </div>
@endsection