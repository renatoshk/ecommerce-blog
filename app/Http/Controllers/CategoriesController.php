<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Photo_products;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Post;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::where('status', 'available')->get();
        $posts = Post::orderBy('created_at')->take(3)->get();
        $user = Auth::user();
        $total_price = 0;
        $orders_count = 0;
        $orders =0;
     if($user){
            $orders = Order::orderBy('created_at')->where('user_id', $user->id)->where('status', 'none')->paginate(2);
            $orders_count = Order::orderBy('created_at')->where('user_id', $user->id)->where('status','none')->count();
            $total_price = Order::orderBy('created_at')->where('user_id', $user->id)->where('status', 'none')->sum('total_price');
           
         } 
    return view('web.index', compact('categories', 'products', 'orders_count', 'total_price', 'orders', 'posts'));
        //
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
        $cats = Category::all();
        $prods = Product::orderBy('created_at', 'DESC')->take(3)->get();
        $categories = Category::findOrFail($id);
        $products = Product::orderBy('created_at', 'DESC')->where('status', 'available')->where('category_id', $id)->paginate(3);
        return view('web.grid-view', compact('categories', 'products', 'cats', 'prods'));
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


    public function show_list($id){
        //
        $cats = Category::all();
        $prods = Product::orderBy('created_at', 'DESC')->where('status', 'available')->take(3)->get();
        $categories = Category::findOrFail($id);
        $products = Product::orderBy('created_at', 'DESC')->where('status', 'available')->where('category_id', $id)->paginate(3);
        return view('web.list-view', compact('categories', 'products', 'cats', 'prods'));
    }



}
