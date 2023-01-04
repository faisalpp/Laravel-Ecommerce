<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request){
        $request->validate([
          'payment_type'=>'required',
        ]);
        //Get all user products from session cart
        $products = session()->get('cart');
        //Get id of address being used in order
        $user_address_id = session()->get('order_address')['user_address_id'];
        //Get user id
        $user_id = session()->get('user')['user_id'];
        
        try{
         //Create New Order withe Above Data
         $order = new Order();
         $order->user_address_id = $user_address_id;
         $order->user_id = $user_id;
         $order->shipping = $request['shipping_price'];
         $order->products = $products;
         $order->total = $request['total'];
         $order->payment_type = $request['payment_type'];
         $order->save();
        }catch(\Exception $e){
         return abort(500);
        }
        if($request['payment_type'] == 'Home Delivery'){
            return view('orderSuccess')->with(compact('order'));
        }else{
            return redirect('/create-checkout-session');
        }
    }

    public function orderSuccess($session_id=''){
     $stripe = new \Stripe\StripeClient('sk_test_51MLNnUSIUsrVmPAjB0qq1h2oSX3uBvhA2lxKSJ1UZBll6MIOoiDZQwKoFSBKwMGABVdML9r8woDOtnwCcNLjc2uK00SKUfhXCF');
     
     $session = $stripe->checkout->sessions->retrieve($session_id);
     $customerDetails = $session->customer_details;
     session()->remove('cart');
     return view('orderComplete')->with(compact('customerDetails'));
    }

    public function orderCancel(){
        return view('cancel');
    }

}
