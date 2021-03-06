<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Photo_users;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;
class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin_web.users_register.index', compact('users'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('role', 'id')->all();
        return view('admin_web.users_register.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
    if(trim($request->password == '')){
            $input = $request->expect('password');
            
        }
        else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password); 
        }
    if($file = $request->file('photo_id')){
        $name = time() .$file->getClientOriginalName();
        $file->move('images', $name);
        $photo = Photo_users::create(['user_register_file'=>$name]);
        $input['photo_id'] = $photo->id;
      }
     User::create($input);
     Session::flash('flash_message', 'The User has been created!');
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
        $user = User::findOrFail($id);
        $roles = Role::pluck('role', 'id')->all();
         return view('admin_web.users_register.edit', compact('roles', 'user'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        //
       $input = $request->all();
       if($file = $request->file('photo_id')){
          $name = time() . $file->getClientOriginalName();
          $file->move('images', $name);
          $photo = Photo_users::create(['user_register_file'=>$name]);
          $input['photo_id'] = $photo->id;
       }   
       $user->update($input);
       Session::flash('flash_message', 'The User has been updated!');
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
        $user = User::findOrFail($id);
        unlink(public_path() . '/images/' .$user->photo->user_register_file);
        $user->delete();
        Session::flash('flash_message', 'The User has been deleted!');
       return redirect()->back();
    }
}
