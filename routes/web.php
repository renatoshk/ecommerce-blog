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
//frontend web routes


Route::get('/contact', function(){
      return view('web.contact');
});
Route::get('/checkout', function(){
      return view('web.checkout');
});

Route::get('/about_us', function(){
      return view('web.about_us');
});
Route::get('/error', function(){
       return view('web.404');
});

//admin frontend group routes

Route::group(['middleware'=>'admin'], function(){
Route::get('/adm ', 'AdminController@index');
Route::resource('/adm/users', 'AdminUsersController');
Route::resource('/adm/users_checkout', 'AdminUsersCheckoutController');
Route::resource('/adm/products', 'AdminProductController');
Route::resource('/adm/order', 'AdminOrdersController');
Route::get('/adm/purchase_orders/','AdminOrdersController@purchase_orders')->name('purchase');
Route::resource('/adm/shippings', 'AdminShippingMethodsController');
Route::resource('/adm/posts', 'AdminPostsController');
Route::resource('/adm/categories', 'AdminCategoriesController');
Route::resource('/adm/postcategories', 'AdminPostCategoryController');
Route::resource('/adm/comments/replies', 'CommentRepliesController');
Route::resource('/adm/currencies', 'AdminCurrencyController');
Route::patch('adm/basecurrency/{id}', 'AdminCurrencyController@basecurrency');
Route::resource('/adm/shipping', 'AdminShippingController');
Route::resource('/adm/payments', 'AdminPaymentsController');
});

Auth::routes();
Route::resource('/profile', 'ProfileController');
Route::resource('/change_password', 'ChangePasswordUsersController');
Route::resource('/', 'CategoriesController');
Route::resource('/category', 'CategoriesController');
Route::get('/cat/{id}', 'CategoriesController@show_list')->name('list');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::resource('/product', 'ProductController');
Route::resource('/orders', 'OrderController');
Route::get('/cart', 'OrderController@cart')->name('cart');
Route::resource('checkout-step-1', 'UserCheckoutController');
Route::resource('checkout-step-2', 'ShippingController');
Route::resource('checkout-step-4', 'PaymentController');
Route::get('/checkout-step-3', 'OrderController@checkout_orders')->name('view_orders');
Route::resource('/blog', 'PostController');
Route::resource('/comments', 'PostsCommentController');
 Route::post('comment/reply', 'CommentRepliesController@createReply');




