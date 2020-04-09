<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Photo_post;
use App\User;
use App\PostCategory;
use App\Http\Requests\PostRequest;
use App\Http\Requests\EditPostRequest;
use Illuminate\Support\Facades\Session;
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
        $categories = PostCategory::pluck('name', 'id')->all();
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
        Session::flash('flash_message', 'The Post has been created!');
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
       $post = Post::findOrFail($id);
       $categories = PostCategory::pluck('name', 'id')->all();
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
     
        Session::flash('flash_message', 'The Post has been updated!');
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
       $post = Post::findOrFail($id);
       unlink(public_path() . '/posts_image/' .$post->photo->file);
       $post->delete();
      Session::flash('flash_message', 'The Post has been deleted!');
      return redirect()->back();
    }
}
