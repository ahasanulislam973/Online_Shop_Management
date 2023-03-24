<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Online_Shop_Management_Controller;
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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('customer',[ Online_Shop_Management_Controller ::class,'customerhome']);
Route::get('admin',[ Online_Shop_Management_Controller ::class,'adminhome']);
Route::post('login',[ Online_Shop_Management_Controller ::class,'login_check']);
Route::get('sign_up',[ Online_Shop_Management_Controller ::class,'sign_up']);
Route::post('save_customer',[ Online_Shop_Management_Controller ::class,'save_customer']);
Route::get('edit_customer/{id}',[ Online_Shop_Management_Controller ::class,'edit_customer']);
Route::post('update_customer',[ Online_Shop_Management_Controller ::class,'update_customer']);
Route::post('add_product',[ Online_Shop_Management_Controller ::class,'add_product']);
Route::get('view_byproduct',[ Online_Shop_Management_Controller ::class,'view_byproduct']);
Route::post('add_to_cart',[ Online_Shop_Management_Controller ::class,'add_to_cart']);
Route::get('view_addtocart_product/{id}',[ Online_Shop_Management_Controller ::class,'view_addtocart_product']);
Route::get('view_product_list',[ Online_Shop_Management_Controller ::class,'view_product_list']);
Route::get('delete_product/{id}',[ Online_Shop_Management_Controller ::class,'delete_product']);
Route::post('update_product',[ Online_Shop_Management_Controller ::class,'update_product']);
Route::get('edit_product/{id}',[ Online_Shop_Management_Controller ::class,'edit_product']);
Route::get('addimage',[ Online_Shop_Management_Controller ::class,'add_image']);
Route::post('store_image',[ Online_Shop_Management_Controller ::class,'storeImage']);
Route::get('sidebar',[ Online_Shop_Management_Controller ::class,'sidebar']);
Route::get('View_Add_to_cart_product/{customerid}',[ Online_Shop_Management_Controller ::class,'View_Add_to_cart_product']);
Route::get('delete_cart_product',[ Online_Shop_Management_Controller ::class,'delete_cart_product']);

