@include('admin.layout.header')
<div class="flex border-2 border-t-500">
@include('admin.sidemenu')
@yield('admin')
</div>
@include('admin.layout.footer')