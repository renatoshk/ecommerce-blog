<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentRequest;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Session;
class PaymentController extends Controller
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

            return view('web.checkout-step-4');
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
    public function store(PaymentRequest $request)
    {
        //
        $user = Auth::user();
        if($user){
           $orders= Order::where('user_id' , $user->id)->where('status', 'none')->pluck('id')->toArray();
           $orders_status = Order::where('status', 'none')->where('user_id', $user->id)->get();
          if(count($orders) > 0){
            $input = $request->all();
            foreach ($orders_status as $order_status) {
                  $new_qty = $order_status->product->qty - $order_status['qty'];

                  if($new_qty > 0){
                    
                    Product::where('id', $order_status->product->id)->update(['qty'=> $new_qty]);
                  }
                  else {
                    Product::where('id', $order_status->product->id)->update(['status'=>'unavailable', 'qty'=>$new_qty]);
                  }  
            }
             
            $input['order_id'] = implode(',', $orders);
            $user->orders()->update(['status'=>'purchase']);
            $user->payments()->create($input);
            Session::flash('flash_message', 'Your order is completed and we will send it in your address!');
            return redirect('/orders');
          } 
          else {
            Session::flash('flash_message', 'Your cart is empty!');
            return redirect()->back();
          }
        }
        else {
              Session::flash('flash_message', 'You need to login to continue shopping!');
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
