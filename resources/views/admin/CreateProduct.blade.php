@extends('admin.layout.main')
@push('title')
    @if (!isset($product))
    <title>Add Product</title>
    @else
    <title>Update Product</title>
    @endif
@endpush
@section('admin')

<div id="wrapper" class="flex w-full h-full items-center justify-center">
 
 <div id="form-wrapper" class="w-fit h-fit mt-10 mb-24 border-2 border-blue-500 rounded-xl">
  <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md">
  <form action="{{$url}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="flex mb-3 w-full justify-center">
     @if(isset($product))
     <img src="{{asset('/storage/images/product')}}/{{$product->image}}" class="w-20 h-20 rounded-xl" />
     @endif
    </div>
    <input type="hidden" name="category_id" value="{{isset($product) ? $product->category_id : null}}" type="text" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="Porduct Title">
    <div class="grid grid-cols-2 gap-4">
      <div class="form-group mb-6">
        <input name="name" value="{{isset($product) ? $product->name : null}}" type="text" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="Porduct Title">
      </div>
      <div class="form-group mb-6">
        <select name="category_id" class="form-select appearance-none block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
         <option selected>Select Category</option>
         @if(isset($categories))
         @foreach ($categories as $category)
         <option value="{{$category->category_id}}">{{$category->name}}</option>  
         @endforeach
         @else
         <option>No Category</option>
         @endif
        </select>
      </div>
    </div>
    <div class="grid grid-cols-2 gap-4">
      <div class="form-group mb-6">
        <input name="price" value="{{isset($product) ? $product->price : null}}" type="number" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="Porduct Price">
      </div>
      <div class="form-group mb-6">
        <input name="quantity" value="{{isset($product) ? $product->quantity : null}}" type="number" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="Porduct Quantity">
      </div>
    </div>
    @if (!isset($product))
     <input name="image" class="form-control block w-full px-2 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="formFileLg" type="file">
    @endif
    <div class="mb-3 xl:w-96">
     <textarea name="desc" class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" rows="3" placeholder="Product Description">{{isset($product) ? $product->desc : null}}</textarea>
    </div>
    <button type="submit" class=" w-full px-6 py-2.5 bg-blue-600 text-white font-bold text-xl leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Add Product</button>
  </form>
</div>
 </div>
</div>

@endsection