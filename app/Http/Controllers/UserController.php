<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signInView(){
      if(!session('user'))
       return view('signIn');
      else{
        return redirect()->back();
      }
    }
    public function signOut(){
      if(session('user')){
        session()->remove('user');
        return redirect()->back();
      }else{
        return redirect()->back();
      }
    }

    public function signIn(Request $request){
       $getUser = User::where('email',$request['email'])->first();
       $pass = Hash::check($request['password'],$getUser->password);
       if($getUser){
        if($pass){
          $user = [
            'user_id'=>$getUser->user_id,
            'name'=> $getUser->name,
            'email'=>$getUser->email,
            'role'=>$getUser->role,
          ];  
          session()->put('user',$user);
          return redirect('/');
        }else{
          echo "Password Not Found";
        }
       }else{
        return abort(404);
       }
    }

    public function signUpView(){
        return view('signUp');
    }

    public function signUp(Request $request){
        $request->validate(
         ['first_name'=>'required',
          'last_name'=>'required',
          'email'=>'required|email',
          'password'=>'required|confirmed',
        ]);

           $user = new User();
           $user->email = $request['email'];
           $user->password = Hash::make($request['password']);
           $user->save();
           $request->session()->flush('success',"You'r account Created, Please Login To proceed");
           return redirect()->back();  
    }
}
