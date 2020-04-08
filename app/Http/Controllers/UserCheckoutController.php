<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckoutUserRequest;
use App\Order;
use Illuminate\Support\Facades\Session;
class UserCheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        if($user){
          return view('web.checkout-step-1');
        }
        else {
            return redirect('/');
        }
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
    public function store(CheckoutUserRequest $request)
    {
        //
        $user = Auth::user();
       if($user){
        $orders= Order::where('user_id' , $user->id)->where('status', 'none')->pluck('id')->toArray();
        

        if(count($orders) > 0){
              $input = $request->all();
              $input['order_id'] = implode(',', $orders);
              $user->user_checkouts()->create($input);
              Session::flash('flash_message', 'Success! Continue to Shipping!');
            return redirect('/checkout-step-2');

        } 
        else{
            Session::flash('flash_message', 'Add products to your cart to continue checkout!');
            return redirect('/');
        }
     }
       else {
               Session::flash('flash_message', 'You need to login'); 
              return redirect('/');
       }  
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
