<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BillingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/mn',function(){
  $stripe = new \Stripe\StripeClient('sk_test_51MLNnUSIUsrVmPAjB0qq1h2oSX3uBvhA2lxKSJ1UZBll6MIOoiDZQwKoFSBKwMGABVdML9r8woDOtnwCcNLjc2uK00SKUfhXCF');
  $req = $stripe->prices->create([
    'unit_amount' => 1200,
    'currency' => 'usd',
    'product_data'=>['name'=>'round Chair'],
  ]);
  print_r($req->currency);
});

//USER SERVING ROUTES         
//1. Render User Home Page View
Route::get('/', [HomeController::class,'index']);

//2. Render One Product with Info in View
Route::get('/product/{id}',[ProductController::class,'index']);

//3. Render All Products Related to One Category in View
Route::get('/products/{id}',[ProductsController::class,'index']);

//4. Render All Categories  in View
Route::get('/all-categories',[CategoryController::class,'index']);

//5. Render cart view with all user selected products
Route::get('/view/cart',[CartController::class,'index']);

//CART OPERATION ROUTES
  //1. Add to Cart & Increment If Exist
  Route::get('/add-to-cart/{product}',[CartController::class,'addToCart']);
  //2. Decrement Item Quantity in Cart
  Route::get('/decrement-from-cart/{product}',[CartController::class,'decrementItem']);
  //3. Remove one Item From Cart
  Route::get('/remove-cart-item/{id}',[CartController::class,'removeCartItem']);
  //4. Development Purpose Reset Cart
  //Route::get('/emptyCart',[CartController::class,'emptyCart']);

//ROUTE GROUP HANDLE ADMIN AUTHENTICATION
Route::middleware(['isLogin'])->group(function(){
 //ORDER RELATED ROUTES
  //1. Render Checkout View
  Route::get('/view/checkout',[CheckoutController::class,'index']);
  //2. Change User Address in Session
  Route::post('/change-address',[CheckoutController::class,'changeAddress']);
  //3. Save User Address in Session
  Route::post('/confirm-checkout',[CheckoutController::class,'confirmCheckout']);
  //4. Render when Order Is Success
  Route::put('/order',[OrderController::class,'orderSuccess']);
  //5. Render Order History Page
  Route::get('/order-history',[OrderHistoryController::class,'index']);
  //6. Billing Form
  Route::get('/billing',[BillingController::class,'index']);
  Route::post('/create-checkout-session',[BillingController::class,'checkoutSession']);
  Route::get('/success',function(){
    return view('success');
  });
  Route::get('/cancel',function(){
    return view('cancel');
  });

});
//AUTHORIZATION & AUTHENTICATION
 //1. Return SignIn Form View
 Route::get('/signin',[UserController::class,'signInView']);
 //2. Render SignUp Form View
 Route::get('/signup',[UserController::class,'signUpView']);
 //3. Authorize User Data and Return Back View
 Route::post('/signIn',[UserController::class,'signIn']);
 //4. Create a User and Return Home View
 Route::post('/signUp',[UserController::class,'signUp']);
 //5. Signout User From Session
 Route::get('/signout',[UserController::class,'signOut']);

 

//ROUTE GROUP HANDLE ADMIN AUTHENTICATION
 Route::middleware(['isAdmin'])->group(function(){
  //1. Render Home Page Of Admin
  Route::get('/admin',[AdminController::class,'admin']);
  //2. To Render All Users View
  Route::get('/admin/view/orders',[AdminController::class,'allOrders']);
  //2. To Render All Users View
  Route::get('/admin/view/users',[AdminController::class,'allUsers']);
  //3. To Render All Products View
  Route::get('/admin/view/products',[AdminController::class,'allProducts']);
  //4. To Render All Categories View
  Route::get('/admin/view/categories',[AdminController::class,'allCategories']);
  //5. Render Create Users Form View
  Route::get('/admin/view/form/user',[AdminController::class,'createUser']);
  //6. Render Update User Form View
  Route::get('/admin/view/form/user-update/{id}',[AdminController::class,'updateUser']);
  //7. Render All Product Form  View
  Route::get('/admin/view/form/product',[AdminController::class,'createProduct']);
  //8. Render Update Porduct Form View
  Route::get('/admin/view/form/product-update/{id}',[AdminController::class,'updateProduct']);
  //9. Render Create Category Form View
  Route::get('/admin/view/form/category',[AdminController::class,'createCategory']);
  //10. Render Update Category View
  Route::get('/admin/view/form/category-update/{id}',[AdminController::class,'updateCategory']);

 //ADMIN CRUD OPERATION ROUTES

 //1. User CRUD Operations
  //1.1 Create New User
  Route::post('/admin/user/new',[CrudController::class,'createUser']);
  //1.2 Delete User with Id
  Route::get('/admin/user/delete/{id}',[CrudController::class,'deleteUser']);
  //1.3 Update User with Id
  Route::post('/admin/user/update',[CrudController::class,'updateUser']);
    
 //2. Product CRUD Operations
  //2.1 Create Product
  Route::post('/admin/product/new',[CrudController::class,'createProduct']);
  //2.2 Delete Product with Id
  Route::get('/admin/product/delete/{id}',[CrudController::class,'deleteProduct']);
  //2.3 Update Product with Id
  Route::post('/admin/product/update',[CrudController::class,'updateProduct']);
 
 //3. Category CRUD Operations
  //3.1 Create Category
  Route::post('/admin/category/new',[CrudController::class,'createCategory']);
  //3.2 Delete Category with Id
  Route::get('/admin/category/delete/{id}',[CrudController::class,'deleteCategory']);
  //3.3 Update Category with Id
  Route::post('/admin/category/update',[CrudController::class,'updateCategory']);
});
 