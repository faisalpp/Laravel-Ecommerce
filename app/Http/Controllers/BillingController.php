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
        // This is your test secret API key.
        \Stripe\Stripe::setApiKey('sk_test_51MLNnUSIUsrVmPAjB0qq1h2oSX3uBvhA2lxKSJ1UZBll6MIOoiDZQwKoFSBKwMGABVdML9r8woDOtnwCcNLjc2uK00SKUfhXCF');
        $checkout_session = \Stripe\Checkout\Session::create(
            [
                'line_items' => [
                  [
                    'product' => 'prod_N60nm3bhKwQb8g',
                    'quantity' => 1,
                  ],
                ],
                'mode' => 'payment',
                'success_url' => url('success'),
                'cancel_url' => url('cancel'),
              ]
    );
        return redirect($checkout_session->url);
    }
}
