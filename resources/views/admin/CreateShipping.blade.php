@extends('admin.layout.main')
@push('title')
    @if(!isset($shipping))
     <title>Add Shipping</title>
    @else
     <title>Update Shipping</title>
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
      <input name="country" value="{{isset($shipping) ? $shipping->country : null}}" type="text" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Country">
      @error('country')
        <h3 class="text-red-500">Country Required</h3>
      @enderror
     </div>
     <div class="form-group mb-6">
      <input name="city" value="{{isset($shipping) ? $shipping->city : null}}" type="text" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="City">
      @error('city')
        <h3 class="text-red-500">City Required</h3>
      @enderror
     </div>
    </div>
    <div class="flex justify-center w-full">
      <div class="flex flex-col mb-6 w-fit">
        <input name="shipping_price" value="{{isset($shipping) ? $shipping->shipping_price : null}}" type="number" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Shipping Price">
        @error('shipping_price')
         <h3 class="text-red-500">Shipping Required</h3>
        @enderror
      </div>
    </div>
    <button class=" w-full px-6 py-2.5 bg-blue-600 text-white font-bold text-xl leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">{{isset($shipping) ? 'Update Shipping': 'Add Shipping'}}</button>
  </form>
</div>
 </div>
</div>

@endsection