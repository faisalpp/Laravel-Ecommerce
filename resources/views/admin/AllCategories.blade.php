@extends('admin.layout.main')
@push('title')
    <title>All Categories</title>
@endpush
@section('admin')
 <div class="flex flex-col w-4/5 ml-5">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="flex justify-end w-full mb-2"><a href="{{url('/admin/view/form/category')}}" class="bg-blue-500 font-bold text-white px-4 py-2 rounded-lg">Add Category</a></div>
      <div class="overflow-hidden">
        <table class="min-w-full text-center">
          <thead class="border-b bg-gray-800">
            <tr>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Id
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Image
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Name
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Description
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Status
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Created At
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Updated At
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Action
              </th>
            </tr>
          </thead class="border-b">
          <tbody>
            @if(isset($categories))
            @foreach ($categories as $category)
            <tr class="bg-white border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$category->category_id}}</td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <img src="{{asset('/storage/images/category')}}/{{$category->image}}" class="w-20 h-20 rounded-xl" />
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$category->name}}
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <h3 class="truncate overflow-hidden w-52">{{$category->desc}}</h3>
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
               @if ($category->status == '0')
                Hidden
               @else
                Visible
               @endif
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$category->created_at}}
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                Dec/25/2022
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
               <div class="flex space-x-3 form-check">
                 <button onclick="window.location='{{url('/admin/view/form/category-update')}}/{{$category->category_id}}'" class="fa-solid fa-pencil text-gray-700 hover:text-gray-500"></button>
                 <button onclick="window.location='{{url('/admin/category/delete')}}/{{$category->category_id}}'" class="fa-solid fa-trash text-red-600 hover:text-red-500"></button>
               </div>
              </td>
            </tr>
            @endforeach
            @else
            <tr><td>No Category Found!</td></tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection