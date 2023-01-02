<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        try{
        $products = Product::limit(4)->get();
        return view('index')->with(compact('products'));
        }catch(\Exception $e){
          return abort('500');
        }
    }
}
