@extends('layout.main')

@section('main')

<div id="wrapper" class="flex w-full h-full items-center justify-center">
 
 <div id="form-wrapper" class="w-1/3 h-fit mt-24 mb-24 border-2 border-blue-500 rounded-xl">
 <form action="{{url('/signIn')}}" method="post" class="flex flex-col shadow-2xl w-full h-fit px-10 py-20 space-y-10">
  <h3 class="text-center font-bold text-blue-500 text-3xl">Sign In</h3>
  @csrf
  <input name="email" type="email" placeholder="Email" class="h-12 text-xl bg-gray-300 border-2 border-gray-400 rounded-lg" />
  <input name="password" type="password" placeholder="Password" class="h-12 text-xl bg-gray-300 border-2 border-gray-400 rounded-lg" />
  <button class="bg-blue-500 px-10 py-2 font-bold text-xl w-fit h-fit self-center rounded-lg text-white">Sign In</button>
 </form>
 </div>

</div>

@endsection