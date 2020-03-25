<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Photo_post;
use App\User;
use App\Category;
use App\Http\Requests\PostRequest;
use App\Http\Requests\EditPostRequest;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin_web.posts.index', compact('posts'));
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
        $categories = Category::pluck('name', 'id')->all();
        return view('admin_web.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        $user = Auth::user();
        $inputPost = $request->all();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('posts_image', $name);
            $photo = Photo_post::create(['file'=>$name]);
            $inputPost['photo_id'] = $photo->id;
        }
        $user->posts()->create($inputPost);
        return redirect('/adm/posts');
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
       $post = Post::findOrFail($id);
       $categories = Category::pluck('name', 'id')->all();
       return view('admin_web.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostRequest $request, $id)
    {
        //
        // $updatePost = Post::findOrFail($id);
        $inputPost = $request->all();
        if($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('posts_image', $name);
            $photo = Photo_post::create(['file'=>$name]);
            $inputPost['photo_id'] = $photo->id;
        }
        Auth::user()->posts()->whereId($id)->first()->update($inputPost);
     
        return redirect('/adm/posts');

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
     Post::findOrFail($id)->delete();
      return redirect('/adm/posts');
    }
}
