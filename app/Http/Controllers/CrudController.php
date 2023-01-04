<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Shipping;

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
         'email'=>'required|email',
         'password'=>'required',
         'role'=>'required',
       ]);

      try{
      $user = new User();
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
      //Validate Request Attributes
      $request->validate([
         'name'=>'required',
         'category_id'=>'required',
         'price'=>'required',
         'quantity'=>'required',
         'image'=>'required',
         'desc'=>'required',
       ]);
       //Create Product Attributes Product name and it's price in return give price id
       
       $stripe = new \Stripe\StripeClient('sk_test_51MLNnUSIUsrVmPAjB0qq1h2oSX3uBvhA2lxKSJ1UZBll6MIOoiDZQwKoFSBKwMGABVdML9r8woDOtnwCcNLjc2uK00SKUfhXCF');
       $req = $stripe->products->create([
          'name'=> $request['name'],
          'description'=>$request['desc'],
          'default_price_data'=>['currency'=>'usd','unit_amount'=>$request['price'].'00'],
       ]);      
       //Create Product
      try{
      $product = new Product();
      $product->name = $request['name'];
      $product->category_id = $request['category_id'];
      $product->price = $request['price'];
      $product->stripe_price_id = $req->default_price;
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

    //Below Three Function Do CRUD Operation On Shippings Table
    public function createShipping(Request $request){
      $request->validate([
         'country'=>'required',
         'city'=>'required',
         'shipping_price'=>'required',
       ]);
      
      try{
      $shipping = new Shipping();
      $shipping->country = $request['country'];
      $shipping->city = $request['city'];
      $shipping->shipping_price = $request['shipping_price'];
      $shipping->save();
      return redirect()->back()->with('success',"Shipping Created Successfully");
      }catch(\Exception $e){
        return abort(500);
      }
    }
    
    public function deleteShipping($id){
      try{
      Shipping::where('shipping_id',$id)->delete();
      return redirect()->back()->with('success','Shipping Deleted Successfully');
      }catch(\Exception $e){
      return abort('500');
      }
    }
    public function updateShipping(Request $request){
      $request->validate([
         'country'=>'required',
         'city'=>'required',
         'shipping_price'=>'required',
      ]);
       
      try{
      Shipping::where('category_id',$request['category_id'])->update([
      'country' => $request['country'],
      'city' => $request['city'],
      'shipping_price' => $request['shipping_price'],
      ]);
      return redirect('/admin/view/shipping')->with('success','Shipping Updated Successfully');
      }catch(\Exception $e){
         return abort(500);
      }
    }
}
