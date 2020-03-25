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
Route::get('/', function () {
      return view('web.index');
});

Route::get('/single_post', function(){
      return view('web.single-post');
});

Route::get('/product_detail', function(){
      return view('web.product-detail-view');
});

Route::get('/list-view', function(){
      return view('web.list-view');
}); 
Route::get('/grid-view', function(){
      return view('web.grid-view');
});
Route::get('/contact', function(){
      return view('web.contact');
});
Route::get('/checkout', function(){
      return view('web.checkout');
});
Route::get('/checkout-step-1', function(){
      return view('web.checkout-step-1');
});
Route::get('/checkout-step-2', function(){
      return view('web.checkout-step-2');
});
Route::get('/checkout-step-3', function(){
      return view('web.checkout-step-3');
});
Route::get('/checkout-step-4', function(){
      return view('web.checkout-step-4');
});
Route::get('/cart', function(){
      return view('web.cart');
});
Route::get('/blog', function(){
      return view('web.blog');
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
Route::resource('/adm/orders', 'AdminOrdersController');
Route::resource('/orders/payments', 'PaymentController');
Route::resource('/orders/shipping','ShippingController');
Route::resource('/adm/shippings', 'AdminShippingMethodsController');
Route::resource('/adm/posts', 'AdminPostsController');
Route::resource('/adm/categories', 'AdminCategoriesController');
Route::resource('/adm/comments', 'PostsCommentController');
Route::resource('/adm/comments/replies', 'CommentRepliesController');
Route::resource('/adm/currencies', 'AdminCurrencyController');
Route::patch('adm/basecurrency/{id}', 'AdminCurrencyController@basecurrency');
});

Auth::routes();
Route::resource('/profile', 'ProfileController');
Route::resource('/change_password', 'ChangePasswordUsersController');
Route::resource('/', 'CategoriesController');
Route::resource('/category', 'CategoriesController');
Route::get('/cat/{id}', 'CategoriesController@show_list')->name('list');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
// Route::get('/', 'HomeController@index');


