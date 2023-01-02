@extends('admin.layout.main')
@push('title')
    @if(!isset($category))
    <title>Add Category</title>
    @else
    <title>Add Category</title>
    @endif
@endpush
@section('admin')

<div id="wrapper" class="flex w-full h-full items-center justify-center">
 
 <div id="form-wrapper" class="w-fit h-fit mt-10 mb-24 border-2 border-blue-500 rounded-xl">
  <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md">
  <form action="{{$url}}" method="post" enctype="multipart/form-data">
    @csrf
     <input type="hidden" name="category_id" value="{{isset($category) ? $category->category_id : null}}" type="text" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
     @if(isset($category))
     <div class="flex justify-center mb-5">
     <img src="{{asset('/storage/images/category')}}/{{$category->image}}" class="w-20 h-20 rounded-xl"/>
     </div>
     @endif
    <div class="grid grid-cols-2 gap-4">
     <div class="form-group mb-6">
      <input name="name" value="{{isset($category) ? $category->name : null}}" type="text" class="form-control block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="Category Name">
      @error('name')
      <h3 class="text-red-500">Name Required</h3>
      @enderror
     </div>
     <div class="form-group mb-6">
     <select name="status" class="form-select appearance-none block w-full px-3 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
      <option selected>Select Category</option>
      <option value="0">Hidden</option>
      <option value="1">Visible</option>
     </select>
      @error('status')
       <h3 class="text-red-500">Status Required</h3>
      @enderror
    </div>
    </div>
    @if(!isset($category))
    <div class="mb-3 w-96">
     <input name="image" class="form-control block w-full px-2 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="formFileLg" type="file">
    </div>
    @endif
    @error('image')
     <h3 class="text-red-500">Image Required</h3>
    @enderror
    <div class="mb-3 xl:w-96">
     <textarea name="desc" class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" rows="3" placeholder="Product Description">{{isset($category) ? $category->desc : null}}</textarea>
     @error('desc')
      <h3 class="text-red-500">Description Required</h3>
     @enderror
    </div>
    <button type="submit" class=" w-full px-6 py-2.5 bg-blue-600 text-white font-bold text-xl leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Add Category</button>
  </form>
</div>
 </div>
</div>

@endsection