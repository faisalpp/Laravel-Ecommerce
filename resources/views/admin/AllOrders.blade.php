@extends('admin.layout.main')
@push('title')
    <title>All Orders</title>
@endpush
@section('admin')
 <div class="flex flex-col w-4/5 ml-5">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
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
                Title
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Description
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Category
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Price
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Quantity
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Action
              </th>
            </tr>
          </thead class="border-b">
          <tbody>
            @if ($products)
            @foreach ($products as $product)
            <tr class="bg-white border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
               {{$product->product_id}}
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <img src="{{asset('/storage/images/product')}}/{{$product->image}}" class="w-20 h-20 rounded-xl" />
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$product->name}}
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <h3 class="truncate overflow-hidden w-52">{{$product->desc}}</h3>
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$product->category_id}}
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                ${{$product->price}}
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$product->quantity}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
               <div class="flex space-x-3 form-check">
                 <button onclick="window.location='{{url('/admin/view/form/product-update')}}/{{$product->product_id}}'" class="fa-solid fa-pencil text-gray-700 hover:text-gray-500"></button>
                 <button onclick="window.location='{{url('/admin/product/delete')}}/{{$product->product_id}}'" class="fa-solid fa-trash text-red-600 hover:text-red-500"></button>
               </div>
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection