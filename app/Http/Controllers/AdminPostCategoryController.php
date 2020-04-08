<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostCategory;
 use Illuminate\Support\Facades\Session;
class AdminPostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post_categories = PostCategory::all();
        return view('admin_web.postcategories.index', compact('post_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $post_categories = PostCategory::all();
        return view('admin_web.postcategories.create', compact('post_categories'));
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
        PostCategory::create($request->all());
        Session::flash('flash_message', 'The Category has been created!');
        return redirect()->back(); 
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
        $post_category = PostCategory::findOrFail($id);
        return view('admin_web.postcategories.edit', compact('post_category'));
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
        $cat_update = PostCategory::findOrFail($id);
        $cat_update->update($request->all());
        Session::flash('flash_message', 'The Category has been updated!');
        return redirect()->back();
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
         PostCategory::findOrFail($id)->delete();
         Session::flash('flash_message', 'The Category has been deleted!');
        return redirect()->back();
    }
}
