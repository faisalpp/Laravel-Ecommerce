<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id){
        $product = Product::where('product_id',$id)->get();
        $category_id = $product->first()->category_id;
        $fproducts = Product::where('category_id',$category_id)->limit(4)->get();
        return view('product')->with(compact('product','fproducts'));
    }
}
