@extends('admin.layout.main')
@push('title')
    <title>All Users</title>
@endpush
@section('admin')
<div class="flex flex-col w-4/5 ml-5">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="flex justify-end w-full mb-2"><a href="{{url('/admin/view/form/user')}}" class="bg-blue-500 font-bold text-white px-4 py-2 rounded-lg">Add User</a></div>
      <div class="overflow-hidden">
        <table class="min-w-full text-center">
          <thead class="border-b bg-gray-800">
            <tr>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Id
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Email
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Password
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                First Name
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Last Name
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Role
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Action
              </th>
            </tr>
          </thead class="border-b">
          <tbody>
            @if ($users)
            @foreach ($users as $user)  
            <tr class="bg-white border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$user->user_id}}</td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$user->email}}
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <h3 class="truncate overflow-hidden w-52">{{$user->password}}</h3>
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$user->first_name}}
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$user->last_name}}
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                @if ($user->role == '0')
                  General
                @else
                  Admin
                @endif
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
               <div class="flex space-x-3 form-check">
                 <button onclick="window.location='{{url('/admin/view/form/user-update')}}/{{$user->user_id}}'" class="fa-solid fa-pencil text-gray-700 hover:text-gray-500"></button>
                 <button onclick="window.location='{{url('/admin/user/delete')}}/{{$user->user_id}}'" class="fa-solid fa-trash text-red-600 hover:text-red-500"></button>
               </div>
              </td>
            </tr>
            @endforeach
            @else
             <tr>
              <td>No User Found</td>
             </tr>              
            @endif
          </tbody>
        </table>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection