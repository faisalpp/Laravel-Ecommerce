@extends('layout.main')
@section('main')
<div class="flex mt-32 mb-32">
<div class="flex flex-col w-full ml-20">
 <div class="grid grid-cols-3">
 @foreach ($products as $product)
   <div><x-product-card  :product="$product"/></div>
</div></a>
 @endforeach
 </div>
</div>
</div>
@endsection