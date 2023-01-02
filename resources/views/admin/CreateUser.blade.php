@extends('admin.layout.main')
@push('title')
    @if(!isset($user))
     <title>Add User</title>
    @else
     <title>Update User</title>
    @endif 
@endpush
@section('admin')

<div id="wrapper" class="flex w-full h-full items-center justify-center">
 
 <div id="form-wrapper" class="w-fit h-fit mt-10 mb-24 border-2 border-blue-500 rounded-xl">
  <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md">
  <form action="{{$url}}" method="post">
    @csrf
    <div class="grid grid-cols-2 gap-4">
     <div class="form-group mb-6">
      <input name="first_name" value="{{isset($user) ? $user->first_name : null}}" type="text" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="First Name">
      @error('first_name')
        <h3 class="text-red-500">First Name Required</h3>
      @enderror
     </div>
     <div class="form-group mb-6">
      <input name="last_name" value="{{isset($user) ? $user->last_name : null}}" type="text" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="Last Name">
      @error('last_name')
        <h3 class="text-red-500">Last Name Required</h3>
      @enderror
     </div>
    </div>
    <div class="grid grid-cols-2 gap-4">
        <input name="user_id" value="{{isset($user) ? $user->user_id : null}}" type="hidden" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="Email">
      <div class="form-group mb-6">
        <input name="email" value="{{isset($user) ? $user->email : null}}" type="email" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="Email">
        @error('email')
         <h3 class="text-red-500">Email Required</h3>
        @enderror
      </div>
      <div class="form-group mb-6">
        <input name="password" {{isset($user) ? 'readonly': null}} value="{{isset($user) ? $user->password : null}}" type="password" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="Password">
        @error('password')
         <h3 class="text-red-500">Password Required</h3>
        @enderror
      </div>
    </div>
    <div class="form-group mb-6">
     <select name="role" class="form-select appearance-none block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
      <option selected>Select Role</option>
      <option value="0">General</option>
      <option value="1">Admin</option>
     </select>
     @error('role')
      <h3 class="text-red-500">Role Required</h3>
     @enderror
    </div>
    <button class=" w-full px-6 py-2.5 bg-blue-600 text-white font-bold text-xl leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">{{isset($user) ? 'Update User': 'Add User'}}</button>
  </form>
</div>
 </div>
</div>

@endsection