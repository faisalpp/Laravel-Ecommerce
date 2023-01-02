<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @stack('title')
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
  @vite([ 'resources/js/app.js', 'resources/css/app.css', 'node_modules/font-awesome/css/font-awesome.min.css'])
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
 </head>
 <body>
 <div id="nav-wrap" class="grid grid-cols-12 items-center w-full bg-white border-b-2 border-gray-300 h-20 px-2 py-5">  
  
   <div class="col-start-2 col-end-2"><i class="fa-solid fa-couch text-5xl text-gray-400"></i></div>    
   
   <div class="col-start-5 col-end-8 flex w-96 border-2 border-gray-400 rounded-md"><input class="w-full px-2 py-1" type="search" placeholder="Search Product"/><button class="mr-2"><i class="fa-solid fa-magnifying-glass"></i></button></div>
   <div class="col-start-10 flex items-center space-x-10 text-lg">
    <button onclick="document.getElementById('cart').style.display = ''" class="flex space-x-2 items-center">
     <i class="fa-solid fa-shopping-cart text-gray-500 text-xl"></i>
     <div class="flex flex-col text-sm items-center">
      <h3 class="text-center bg-black rounded-full px-2 text-white">{{session('cart') ? count(session('cart')) : '0'}}</h3>
      <h3 class="text-sm">Cart</h3>
     </div>
    </button>
    @if (session()->has('user'))
    <div class="flex items-center space-x-1"><i class="fa-solid fa-user text-xl"></i><div class="flex flex-col items-center"><a href="{{url('/order-history')}}" class="text-sm">Account</a><a href="{{url('/signout')}}" class="text-xs hover:text-blue-500">Logout</a></div></div>             
    @else
    <div class="flex space-x-3 items-center font-bold">
     <a href="{{url('/signin')}}" class="bg-blue-500 px-3 py-2 rounded-lg text-white">Login</a>
     <a href="{{url('/signout')}}" class="px-3 py-2 rounded-lg text-black border-2 border-black">Register</a>
    </div>
    @endif
   </div>
 </div>
 <div class="flex space-x-5 items-center justify-center py-3 font-bold text-lg">
  <a href="{{url('/')}}" class="hover:underline">Home</a>
  <a href="{{url('/products/1')}}" class="hover:underline">Chairs</a>
  <a href="{{url('/products/2')}}" class="hover:underline">Sofas</a>
  <a href="{{url('/products/3')}}" class="hover:underline">Beds</a>
  <a href="{{url('/about')}}" class="hover:underline">About</a>
  <a href="{{url('/contactus')}}" class="hover:underline">Contact Us</a>
 </div>
  @if(session()->has('success'))
  <div class="flex items-center justify-center space-x-10 text-lg bg-blue-500 text-white font-bold">
   <h3 class="text-center">{{session()->get('success')}}</h3>    
  </div>
  @endif
<x-sideCart/>