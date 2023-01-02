<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class CrudController extends Controller
{
  //Below Three Function Do CRUD Operation On Orders Table
  public function deleteOrder($id){
    try{
    $user = User::where('user_id',$id)->delete();
    return redirect()->back()->with('success','User Deleted Successfully');
    }catch(\Exception $e){
      return abort('500');
    }
  } 
  
  //Below Three Function Do CRUD Operation On Users Table
    public function createUser(Request $request){
       $request->validate([
         'first_name'=>'required',
         'last_name'=>'required',
         'email'=>'required|email',
         'password'=>'required',
         'role'=>'required',
       ]);

      try{
      $user = new User();
      $user->first_name = $request['first_name'];
      $user->last_name = $request['last_name'];
      $user->email = $request['email'];
      $user->password = Hash::make($request['password']);
      $user->role = $request['role'];
      $user->save();
      return redirect()->back()->with('success',"You'r Account Created, Please Login to Proceed.");
      }catch(\Exception $e){
      return abort('500');
      } 
   }
    
    public function deleteUser($id){
       try{
       $user = User::where('user_id',$id)->delete();
       return redirect()->back()->with('success','User Deleted Successfully');
       }catch(\Exception $e){
         return abort('500');
       }
    }
    
    public function updateUser(Request $request){
      $request->validate([
         'first_name'=>'required',
         'last_name'=>'required',
         'email'=>'required|email',
         'password'=>'required',
         'role'=>'required',
      ]);
       
      try{
      $user = User::where('user_id',$request['user_id'])->update([
      'first_name' => $request['first_name'],
      'last_name' => $request['last_name'],
      'email' => $request['email'],
      'password' => $request['password'],
      'role' => $request['role'],
       ]);
      return redirect('/admin/view/users')->with('success','User Updated Successfully');
      }catch(\Exception $e){
         return abort(500);
      }
    }
    
    //Below Three Function Do CRUD Operation On Products Table
    public function createProduct(Request $request){
      $request->validate([
         'name'=>'required',
         'category_id'=>'required',
         'price'=>'required',
         'quantity'=>'required',
         'image'=>'required',
         'desc'=>'required',
       ]);

      try{
      $product = new Product();
      $product->name = $request['name'];
      $product->category_id = $request['category_id'];
      $product->price = $request['price'];
      $product->quantity = $request['quantity'];
      $img_name = "EC-".time().'.'.$request['image']->extension();
      $request->image->storeAs('/public/images/product', $img_name);
      $product->image = $img_name;
      $product->desc = $request['desc'];
      $product->save();

      

      return redirect()->back()->with('success',"Product Created Successfully");
      }catch(\Exception $e){
        return abort(500);
      }
    }
    
    public function deleteProduct($id){
      try{
      $product = Product::where('product_id',$id)->delete();
      return redirect()->back()->with('success','Porduct Deleted Successfully');
      }catch(\Exception $e){
      return abort('500');
      }
    }
    
    public function updateProduct(Request $request){
      $request->validate([
        'name'=>'required',
        'category_id'=>'required',
        'price'=>'required',
        'quantity'=>'required',
        'desc'=>'required',
      ]);
      
     
     $category = Product::where('category_id',$request['category_id'])->update([
     'name' => $request['name'],
     'category_id' => $request['category_id'],
     'price' => $request['price'],
     'quantity' => $request['quantity'],
     'desc' => $request['desc'],
     ]);
     return redirect('/admin/view/products')->with('success','Product Updated Successfully');   
    }
  
    //Below Three Function Do CRUD Operation On Categories Table
    public function createCategory(Request $request){
      $request->validate([
         'name'=>'required',
         'status'=>'required|numeric',
         'image'=>'required',
         'desc'=>'required',
       ]);

      
      $category = new Categories();
      $category->name = $request['name'];
      $category->status = $request['status'];
      $img_ext = explode('.',$request['image']);
      $img_name = "EC-".time().'.'.$request['image']->extension();
      $request->image->storeAs('/public/images/category', $img_name);
      $category->image = $img_name;
      $category->desc = $request['desc'];
      $category->save();
      return redirect()->back()->with('success',"Category Created Successfully");
      
    }
    
    public function deleteCategory($id){
      try{
      $category = Categories::where('category_id',$id)->delete();
      return redirect()->back()->with('success','Category Deleted Successfully');
      }catch(\Exception $e){
      return abort('500');
      }
    }
    public function updateCategory(Request $request){
      $request->validate([
         'name'=>'required',
         'status'=>'required',
         'desc'=>'required',
      ]);
       
      try{
      $category = Categories::where('category_id',$request['category_id'])->update([
      'name' => $request['name'],
      'status' => $request['status'],
      'desc' => $request['desc'],
      ]);
      return redirect('/admin/view/categories')->with('success','Category Updated Successfully');
      }catch(\Exception $e){
         return abort(500);
      }
    }
}
