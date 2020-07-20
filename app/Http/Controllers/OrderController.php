<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Shipping;
use Illuminate\Support\Facades\Session;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          
    if($user =  Auth::user()){
        $orders = Order::orderBy('created_at')->where('user_id', $user->id)->where('status', 'purchase')->paginate(3);
        return view('web.profile.index', compact('orders'));
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
    public function store(Request $request)
    {
        //
        $user = Auth::user(); 
     if($user){ 
                $input = $request->all();
                $prod_qty = $input['prod_qty'];
                $qty = $input['qty'];
            if($qty <= $prod_qty){
                $price = $input['total_price'];
                $price = $price * $qty;
                $input['total_price'] = $price;
                $user->orders()->create($input); 
                Session::flash('flash_message', 'The product is in your shopping cart !');
                return redirect('/cart');
              }
             else {
               Session::flash('flash_message', 'This quantity is not available for this product!');
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
       $user = Auth::user();
       if($user){
       $orders =Order::orderBy('created_at')->where('status', 'none')->where('user_id', $user->id)->where('id', $id)->get();
         foreach ($orders as $order) {
                 $input = $request->all();
                 $qty = $input['qty'];
                 $price = $qty * $order->product->price;
                 $input['total_price'] = $price;
                 $user->orders()->whereId($id)->first()->update($input);
                 Session::flash('flash_message', 'Your Product has been updated!');
                 return redirect()->back();
           }
        } 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Order::findOrFail($id)->delete();
       Session::flash('flash_message', 'Your Product is out from your Shopping Cart!');
       return redirect()->back();
    }
    //show orders at cart
     public function cart(){
        $user = Auth::user();
        if($user){
        $orders = Order::orderBy('created_at')->where('user_id', $user->id)->where('status', 'none')->paginate(3);    
        $total_price = Order::orderBy('created_at')->where('user_id', $user->id)->where('status', 'none')->sum('total_price');
         return view('web.cart' , compact('total_price', 'orders'));
        }
        else {
             Session::flash('flash_message', 'You need to login to add products in your cart!');
             return redirect ('/');
        }
    }

 //show orders in checkout third step
    public function checkout_orders(){
           $user = Auth::user();
           if($user){
              //orders qe ka useri qe jan akoma ne cart
              $orders = Order::orderBy('created_at')->where('user_id', $user->id)->where('status', 'none')->get();
               //id e orders qe po ben ky user
              $orderss = Order::orderBy('created_at')->where('user_id', $user->id)->where('status', 'none')->pluck('id')->toArray();
               //ndarja e id si tek order id tek shipping
              $orderss = implode(',',$orderss);
               //marrja nga db e shipping te orders perkates
              $shippings = Shipping::where('user_id', $user->id)->where('order_id', $orderss)->get();
             //cmimi total i te gjithe produkteve qe po bejm checkout
              $total_price = Order::orderBy('created_at')->where('user_id', $user->id)->where('status', 'none')->sum('total_price');

              return view('web.checkout-step-3', compact('orders', 'total_price', 'shippings'));
           }
           else {
                 return redirect('/');
           }
    }

}
