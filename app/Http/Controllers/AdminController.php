<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class AdminController extends Controller
{
    //To Render Home Page Of Admin
  public function admin(){
    $products = Product::all()->count();
    $users = User::all()->count();
    $categories = Categories::all()->count();
    return view('admin.index')->with(compact('products','users','categories'));
  }  
  
  public function allOrders(){
    $orders = Order::all();
    return view('admin.AllOrders')->with(compact('orders'));
  }
  public function allUsers(){
    $users = User::all();
    return view('admin.AllUser')->with(compact('users'));
  }
  public function allProducts(){
    $products = Product::all();
    return view('admin.AllProducts')->with(compact('products'));
  }
  
  public function allCategories(){
    $categories = Categories::all();
    return view('admin.AllCategories')->with(compact('categories'));
  }
  public function createProduct(){
    $categories = Categories::where('status','1')->get();
    $url = url('/admin/product/new');
    return view('admin.CreateProduct')->with(compact('url','categories'));
  }
  public function createCategory(){
    $url = url('/admin/category/new');
    return view('admin.CreateCategory')->with('url',$url);
  }
  public function createUser(){
    $url = url('/admin/user/new');
    return view('admin.CreateUser')->with('url',$url);
  }
  
  public function updateUser($id){
    $user = User::where('user_id',$id)->first();
    $url = url('/admin/user/update');
    return view('admin.CreateUser')->with(compact('url','user'));
  }

  public function updateProduct($id){
    $product = Product::where('product_id',$id)->first();
    $categories = Categories::all();
    $url = url('/admin/product/update');
    return view('admin.CreateProduct')->with(compact('url','product','categories'));
  }

  public function updateCategory($id){
    $category = Categories::where('category_id',$id)->first();
    $url = url('/admin/category/update');
    return view('admin.CreateCategory')->with(compact('url','category'));
  }

}
