<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Shipping;
use App\Shipping_method;
use App\Http\Requests\ShippingRequest;
use Illuminate\Support\Facades\Auth;
use App\Order;
use Illuminate\Support\Facades\Session;
class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $shipping_methods = Shipping_method::all(); 
       return view('web.checkout-step-2', compact('shipping_methods'));
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
    public function store(ShippingRequest $request)
    {
        $user = Auth::user();
        if($user){
          $orders= Order::where('user_id' , $user->id)->where('status', 'none')->pluck('id')->toArray();

        if(count($orders) > 0){
          $input = $request->all();
          $input['order_id'] = implode(',', $orders);
          $user->shippings()->create($input);
          Session::flash('flash_message', 'Success! Confirm Order!');
        return redirect('/checkout-step-3');
        }
        else {
            Session::flash('flash_message', 'You need to add products in your cart and follow steps to checkout');
            return redirect()->back();
        }
         
        }
        else{
            Session::flash('flash_message', 'You need to login');
            return redirect('/');
        }
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
