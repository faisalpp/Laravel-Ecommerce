<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    public function index(){
        $orderHistory = Order::where('user_id',session()->get('user')['user_id'])->get();
        return view('orderHistory')->with(compact('orderHistory'));
        //print($orderHistory);
    }
}
