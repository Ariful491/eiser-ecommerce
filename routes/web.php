<?php

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

Route::get('/','EiserController@index')->name('index');
Route::get('/category/{id}/{name}','EiserController@category')->name('category');
Route::get('/details/{id}','EiserController@productDetails')->name('product_details');





Route::post('/cart','CartController@addCart')->name('add-cart');
Route::get('/cart','CartController@viewCart');
Route::get('/delete-cart/{id}','CartController@deleteCart')->name('delete-cart');
Route::post('/cart_update','CartController@updateCart')->name('cart-update');



Route::get('/checkout','CheckoutController@index')->name('checkout');
Route::post('/checkout/sign-up','CheckoutController@CheckoutSignUp')->name('checkout-sign-up');
Route::post('/checkout/log-in','CheckoutController@CheckoutlogIn')->name('check-login');
Route::post('/checkout/logout','CheckoutController@logout')->name('logout');
Route::get('/checkout/shipping','CheckoutController@shipping');
Route::post('/new-shipping','CheckoutController@saveShippingInfo')->name('new-shipping');
Route::get('/checkout/payment','CheckoutController@paymentForm');

Route::post('/checkout/conform','CheckoutController@orderConform')->name('new-order');
Route::get('/checkout/payment/order-conform','CheckoutController@conformPayment');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add-category','CategoryController@index')->name('add-category');
Route::post('/add-category/new','CategoryController@saveCategory')->name('new-category');
Route::get('/view-category','CategoryController@viewCategory')->name('view-category');
Route::get('/published-Category/{id}','CategoryController@publishedCategory')->name('published-Category');
Route::get('/unpublished-Category/{id}','CategoryController@unpublishedCategory')->name('unpublished-Category');
Route::post('/category/update-category','CategoryController@updateCategory')->name('update-category');
Route::get('/delete-Category/{id}','CategoryController@deleteCategory')->name('delete-Category');


Route::get('/add-brand','BrandController@index')->name('add-brand');
Route::post('/new-brand','BrandController@addBrand')->name('new-brand');
Route::get('/view-brand','BrandController@viewBrand')->name('view-brand');
Route::get('/view-brand/published-brand/{id}','BrandController@publishedBrand')->name('published-brand');
Route::get('/view-brand/unpublished-brand/{id}','BrandController@unpublishedBrand')->name('unpublished-brand');
Route::post('/view-brand/update-brand','BrandController@updatedBrand')->name('update-brand');
Route::get('/view-brand/delete-brand/{id}','BrandController@deleteBrand')->name('delete-brand');



Route::get('/add-product','ProductController@index')->name('add-product');
Route::post('/new-product','ProductController@add_product')->name('new-product');
Route::get('/view-product','ProductController@view_product')->name('view-product');
Route::get('/published-product/{id}','ProductController@published_product')->name('published-product');
Route::get('/unpublished-product/{id}','ProductController@unpublished_product')->name('unpublished-product');
Route::post('/update_product','ProductController@update_product')->name('update_product');
Route::get('/deleted_product/{id}','ProductController@deleted_product')->name('deleted-product');


Route::get('/orders','OrderController@index')->name('order');
Route::get('/single-view-orders/{id}','OrderController@viewOrder')->name('view-order-details');
