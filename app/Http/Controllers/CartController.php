<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CartController extends Controller
{
  public function index(){
   return view('cart');
  }

  public function addToCart(Product $product){
      $cart = session()->get('cart');
      if(!$cart){
        $cart = [
          $product->product_id =>[
            'name' => $product->name,
            'quantity' => 1,
            'price' => $product->price,
            'image' => $product->image
          ]
        ];
        session()->put('cart',$cart);
        return redirect('/view/cart');
      }

      if(isset($cart[$product->product_id])){
        $cart[$product->product_id]['quantity']++;
        session()->put('cart',$cart);
        return redirect('/view/cart');
      }else{
        $cart[$product->product_id] = [
          'name' => $product->name,
          'quantity' => 1,
          'price' => $product->price,
          'image' => $product->image
        ];
        session()->put('cart',$cart);
        return redirect('/view/cart');
      }
  }

  public function decrementItem(Product $product){
    $cart = session()->get('cart');
    if(isset($cart)){
      $cart[$product->product_id]['quantity']--;
      session()->put('cart',$cart);
      return redirect('/view/cart');
    }
  }

  public function emptyCart(){
    session()->remove('cart');
    return redirect()->back();
  }

  public function removeCartItem($id){
    $cart = session()->get('cart');
    if(isset($cart[$id])){
      unset($cart[$id]);
      session()->put('cart',$cart);
    }
    return redirect()->back();
  }

}
