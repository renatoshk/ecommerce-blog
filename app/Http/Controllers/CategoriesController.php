<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Photo_products;
use App\Product;
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
        $products = Product::all();
        return view('web.index', compact('categories', 'products'));
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
        $products = Product::orderBy('created_at', 'DESC')->where('category_id', $id)->paginate(3);
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
        $prods = Product::orderBy('created_at', 'DESC')->take(3)->get();
        $categories = Category::findOrFail($id);
        $products = Product::orderBy('created_at', 'DESC')->where('category_id', $id)->paginate(3);
        return view('web.list-view', compact('categories', 'products', 'cats', 'prods'));
    }
}
