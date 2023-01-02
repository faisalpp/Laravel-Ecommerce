<a href="{{url('/products')}}/{{$id}}"><div class="flex flex-col w-full h-full hover:scale-90 rounded-lg mt-10">
 <img src="{{asset('/storage/images/category')}}/{{$image}}" class="w-full h-96  rounded-t-lg"/>
 <div class="flex w-full justify-center bg-black/80 py-2 text-center text-white text-2xl font-bold"><h3>{{$category}}</h3></div>
</div></a>