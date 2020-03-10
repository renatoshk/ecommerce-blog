<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping_method;
use App\Http\Requests\ShippingMethodRequest;


class AdminShippingMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shippings_method = Shipping_method::all();
        return view('admin_web.shippings_method.index', compact('shippings_method'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $shipping = Shipping_method::all();
        return view('admin_web.shippings_method.create', compact('shipping'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingMethodRequest $request)
    {
        //
        $input = $request->all();
        Shipping_method::create($input);
        return redirect('/adm/shippings');
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
        $shippings_edit = Shipping_method::findOrFail($id);
        return view('admin_web.shippings_method.edit', compact('shippings_edit'));

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
        $shipping = Shipping_method::findOrFail($id);
        $input = $request->all();
        $shipping->update($input);
        return redirect('/adm/shippings');

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
        $shipping = Shipping_method::findOrFail($id)->delete();
        return redirect('/adm/shippings');
    }
}
