@extends('layout.main')

@section('main')

<div id="wrapper" class="flex w-full h-full items-center justify-center">
 
 <div id="form-wrapper" class="w-1/2 h-fit mt-24 mb-24 border-2 border-blue-500 rounded-xl">
 <form action="{{url('/signUp')}}" method="post" class="flex flex-col shadow-2xl w-full h-fit px-10 py-20 space-y-10 items-center">
  @csrf
  <h3 class="text-center font-bold text-blue-500 text-3xl">Sign In</h3>
    <div id="name" class="flex space-x-5 w-96">
     <div class="flex flex-col w-full">
     <input type="text" name="first_name" placeholder="First Name" class="focus:border-blue-500 !outline-none border-2 border-gray-300 px-2 py-3 w-fit rounded-lg" />
      @error('first_name')
        <x-formError :msg='$message' />
      @enderror
     </div>
     <div class="flex flex-col w-full"> 
     <input type="text" name="last_name" placeholder="Last Name" class="focus:border-blue-500 !outline-none border-2 border-gray-300 px-2 py-3 w-fit rounded-lg" />
      @error('last_name')
      <x-formError :msg='$message'/>
      @enderror
     </div>
    </div>
    <div class="flex flex-col">
    <input name="email" type="email" placeholder="Enter Email" class="focus:border-blue-500 !outline-none border-2 border-gray-300 px-2 py-3 w-96 rounded-lg" />
    @error('email')
     <x-formError :msg='$message'/>
    @enderror
    </div>
    <div class="flex space-x-5 w-96">
    <div class="flex flex-col">
    <input name="password" type="password" placeholder="Enter Password" class="focus:border-blue-500 !outline-none border-2 border-gray-300 px-2 py-3 w-fit rounded-lg" />
     @error('password')
     <x-formError :msg='$message'/>
     @enderror
    </div>
    <div class="flex flex-col">
    <input name="password_confirmation" type="password" placeholder="Confirm Password" class="focus:border-blue-500 !outline-none border-2 {{session()->has('msg') ? 'border-red-300' :'border-gray-300'}} px-2 py-3 w-fit rounded-lg" />
    </div>
    </div>
     <div class="flex flex-col">
     <input type="text" name="address" placeholder="Address" class="focus:border-blue-500 !outline-none border-2 border-gray-300 px-2 py-3 w-96 rounded-lg" />
      @error('address')
       <x-formError :msg='$message' />
      @enderror
     </div>
    <div class="flex space-x-5 w-96">
     <div class="flex flex-col">
     <input type="text" name="phone" placeholder="Phone" class="focus:border-blue-500 !outline-none border-2 border-gray-300 px-2 py-3 w-fit rounded-lg" />
     @error('phone')
      <x-formError :msg='$message' />
     @enderror
     </div>
     <div class="flex flex-col">
     <input type="text" name="city" placeholder="City" class="focus:border-blue-500 !outline-none border-2 border-gray-300 px-2 py-3 w-fit rounded-lg" />
      @error('city')
       <x-formError :msg='$message' />
      @enderror
     </div>
    </div>
    <div id="name" class="flex space-x-5 w-96">
     <div class="flex flex-col">
      <input type="text" name="postal_code" placeholder="Postal Code" class="focus:border-blue-500 !outline-none border-2 border-gray-300 px-2 py-3 w-fit rounded-lg" />
       @error('postal_code')
        <x-formError :msg='$message' />
       @enderror
     </div>
     <div class="flex flex-col">
      <select name="country" class="focus:border-blue-500 [&>option]:font-bold [&>option]:border-gray-300 text-gray-400 !outline-none  w-fit px-2 py-3 border-2 border-gray-300 rounded-lg ">
       <option selected>Select Country</option>
       <option value="PK">Pakistan</option>
       <option value="IN">India</option>
       <option value="AFG">Afghanistan</option>
      <select/>
      @error('country')
       <x-formError msg='Country Required' />
      @enderror
     </div>
    </div>
     <button class="bg-blue-500 px-10 py-2 font-bold text-xl w-fit h-fit self-center rounded-lg text-white">Sign Up</button>
 </form>
 </div>

</div>

@endsection