<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        try{
            $addresses = UserAddress::where('user_address_id',session()->get('user')['user_id'])->get();
            return view('checkout')->with(compact('addresses'));
        }catch(\Exception $e){
            return view('signIn');
        }
    }

    public function changeAddress(Request $request){
        $address = UserAddress::where('user_address_id',$request['user_address_id'])->get();
        session()->remove('order_address');
            $userAddress = session()->get('order_address');
            $userAddress = [
                'first_name' => $address->first()->first_name,
                'last_name' => $address->first()->last_name,
                'address'=> $address->first()->address,
                'postal_code' => $address->first()->postal_code,
                'city' => $address->first()->city,
                'country' => $address->first()->country,
                'phone' => $address->first()->phone,
                ];
                session()->put('order_address',$userAddress);
                return redirect()->back();
    }

    public function confirmCheckout(Request $request){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'postal_code' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required',
        ]);
         
        //Save User Address in DataBase
        try{
        $address = UserAddress::updateOrCreate(
         [
         'first_name' => $request['first_name'],
         'last_name' => $request['last_name'],
         'address' => $request['address'],
         'postal_code' => $request['postal_code'],
         'city' => $request['city'],
         'country' => $request['country'],
         'phone' => $request['phone'],
         'user_id' => $request['user_id'],    
        ],
        );  
        // And Store User Address in session
        $userAddress = session()->get('order_address');
        if(!$userAddress){
            $userAddress = [
            'user_address_id'=>$address->user_address_id,
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'address'=> $request['address'],
            'postal_code' => $request['postal_code'],
            'city' => $request['city'],
            'country' => $request['country'],
            'phone' => $request['phone'],
            ];
            session()->put('order_address',$userAddress);
        }else{
            session()->remove('order_address');
            $userAddress = session()->get('order_address');
            $userAddress = [
                'user_address_id'=>$address->user_address_id,
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'address'=> $request['address'],
                'postal_code' => $request['postal_code'],
                'city' => $request['city'],
                'country' => $request['country'],
                'phone' => $request['phone'],
                ];
                session()->put('order_address',$userAddress);
        }
        $shipping = Shipping::where('city',$request['city'])->first();
        return view('confirmCheckout')->with(compact('shipping'));
        }catch(\Exception $e){
            return abort(500);
        }
    }
}
