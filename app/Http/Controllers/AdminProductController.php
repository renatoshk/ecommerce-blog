<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Category;
use App\Photo_products;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\EditProductRequest;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('admin_web.products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->all();
        return view('admin_web.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();
        if($file = $request->file('image_id')){
            $name = time().$file->getClientOriginalName();
            $file->move('product_images', $name);
            $photo = Photo_products::create(['product_file'=>$name]);
            $input['image_id'] = $photo->id; 
        }

        // Product::create($input);
        $user->products()->create($input);
        return redirect('/adm/products');
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
        $product = Product::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('admin_web.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        //
       // $product = Product::findOrFail($id);
       $input = $request->all();
        if($file = $request->file('image_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('product_images', $name);
            $photo = Photo_products::create(['product_file'=>$name]);
            $input['image_id'] = $photo->id;
        }
        Auth::user()->products()->whereId($id)->first()->update($input);
        // $product->update($input);
        return redirect('/adm/products');
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
        $product = Product::findOrFail($id);
        $product->delete();
       return redirect('/adm/products');
    }
}
