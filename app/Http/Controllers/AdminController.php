<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\User;
use App\User_Checkout;
use App\Shipping;
use App\Payment;
use App\Post;
use App\Comment;
use App\Category;
use App\PostCategory;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $products_available_count = Product::where('status', 'available')->count();
        $products_unavailable_count = Product::where('status', 'unavailable')->count();
        $cart_orders = Order::where('status', 'none')->count();
        $purchased_orders = Order::where('status', 'purchase')->count();
        $users = User::all();
        $users_checkout = User_Checkout::all();
        $shippings = Shipping::all();
        $payments = Payment::all();
        $posts = Post::all();
        $comments  = Comment::all();
        $categories = Category::all();
        $post_categories = PostCategory::all();
        return view('admin_web.dashboard', compact('products_available_count', 'products_unavailable_count', 'cart_orders', 'purchased_orders', 'users', 'users_checkout', 'shippings', 'payments','posts', 'comments', 'categories', 'post_categories'));     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
