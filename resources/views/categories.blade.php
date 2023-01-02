@extends('layout.main')
@section('main')
<div class="flex mt-32 mb-32">
<div class="flex flex-col w-full ml-20">
 <div class="grid grid-cols-4">
  @foreach ($categories as $category)
      <a href="{{url('/products')}}/{{$category->category_id}}"><x-category-card :name="$category->name" :image="$category->image" :desc="$category->desc"/></a>
  @endforeach
 </div>
</div>
</div>
@endsection