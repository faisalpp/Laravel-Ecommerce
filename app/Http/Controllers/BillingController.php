<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//require 'vendor/autoload.php';

class BillingController extends Controller
{
    public function index(){
        return view('billing');
    }

    public function checkoutSession(){
      $userId = session()->get('user')['user_id'];
      $email = session()->get('user')['email'];
      $address = session()->get('order_address')['address'];
      $name = session()->get('order_address')['first_name'] . session()->get('order_address')['last_name']; 
      $product_array = [];
      foreach(session('cart') as $product_id=>$product){
        $item = ['price'=>$product['spId'],'quantity'=>$product['quantity']];
        array_push($product_array,$item);
      }
      
      // This is your test secret API key.
        \Stripe\Stripe::setApiKey('sk_test_51MLNnUSIUsrVmPAjB0qq1h2oSX3uBvhA2lxKSJ1UZBll6MIOoiDZQwKoFSBKwMGABVdML9r8woDOtnwCcNLjc2uK00SKUfhXCF');
        $checkout_session = \Stripe\Checkout\Session::create(
         [
          'line_items' => $product_array,
                'client_reference_id'=> $userId,
                'customer_email'=>$email,
                'mode' => 'payment',
                'success_url' => url('/order-success/{CHECKOUT_SESSION_ID}'),
                'cancel_url' => url('/order-cancel'),
              ]
    );
        return redirect($checkout_session->url);
    }
}
