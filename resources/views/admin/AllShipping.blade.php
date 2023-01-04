@extends('admin.layout.main')
@push('title')
    <title>All Prodcts</title>
@endpush
@section('admin')
 <div class="flex flex-col w-4/5 ml-5">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="flex justify-end w-full mb-2"><a href="{{url('/admin/view/form/shipping')}}" class="bg-blue-500 font-bold text-white px-4 py-2 rounded-lg">Add Shipping</a></div>
      <div class="overflow-hidden">
        @if($shippings)
        <table class="min-w-full text-center">
          <thead class="border-b bg-gray-800">
            <tr>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Id
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                City
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Country
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Shipping Price
              </th>
              <th scope="col" class="text-lg font-bold text-white px-6 py-4">
                Action
              </th>
            </tr>
          </thead class="border-b">
          <tbody>
            @foreach ($shippings as $shipping)
            <tr class="bg-white border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
               {{$shipping->shipping_id}}
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$shipping->country}}
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$shipping->city}}
              </td>
              <td class="text-lg text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                ${{$shipping->shipping_price}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
               <div class="flex space-x-3 form-check">
                 <button onclick="window.location='{{url('/admin/view/form/shipping-update')}}/{{$shipping->shipping_id}}'" class="fa-solid fa-pencil text-gray-700 hover:text-gray-500"></button>
                 <button onclick="window.location='{{url('/admin/shipping/delete')}}/{{$shipping->shipping_id}}'" class="fa-solid fa-trash text-red-600 hover:text-red-500"></button>
               </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection