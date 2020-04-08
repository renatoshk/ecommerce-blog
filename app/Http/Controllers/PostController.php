<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostCategory;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $posts = Post::orderBy('created_at')->paginate(3);
         $categories = PostCategory::all();
         $latest_blogs = Post::orderBy('created_at')->paginate(3);
         return view('web.blog', compact('posts', 'categories', 'latest_blogs'));
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

        // $categories = PostCategory::findOrFail($id);
        $categories = PostCategory::all();
        $posts = Post::orderBy('created_at', 'DESC')->where('category_id', $id)->paginate(3);
        $latest_blogs = Post::orderBy('created_at')->paginate(3);
        return view('web.blog', compact('categories', 'posts', 'latest_blogs'));
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
        $post = Post::findOrFail($id);
        $categories = PostCategory::all();
        $latest_blogs = Post::orderBy('created_at')->paginate(3);
        $comments = $post->comments()->whereisActive(1)->orderBy('created_at', 'DESC')->get();
        
        return  view('web.single-post',  compact('post', 'categories', 'latest_blogs', 'comments'));
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
