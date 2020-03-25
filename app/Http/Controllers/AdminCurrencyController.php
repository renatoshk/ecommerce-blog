<?php

namespace App\Http\Controllers;
use App\Currency;
use Illuminate\Http\Request;
use App\Http\Requests\CurrencyRequest;
use App\Http\Requests\EDitCurrencyRequest;

class AdminCurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $currencies =  Currency::all();
        return view('admin_web.currencies.index', compact('currencies'));
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $currencies =  Currency::all();
         return view('admin_web.currencies.create', compact('currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {
        $currencies =  Currency::where('is_base_currency','1')->first();
        // dd($currencies);

        if(!$currencies){
             $currencyInput = $request->all();
             $currencyInput['is_base_currency'] = 1;
         }
          else {
            $currencyInput = $request->all();
            $currencyInput['is_base_currency'] = 0;
          }
        Currency::create($currencyInput);
        return redirect('/adm/currencies');
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
         $currencies = Currency::findOrFail($id);
         return view('admin_web.currencies.edit', compact('currencies')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EDitCurrencyRequest $request, $id)
    {
        //
        $update_currency = Currency::findOrFail($id);
        $input = $request->all();
        $update_currency->update($input);
        return redirect('/adm/currencies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Currency::findOrFail($id)->delete();
        return redirect('/adm/currencies');
        //
    }
  public function basecurrency($id){
    
     $update_currency = Currency::findOrFail($id);
     $basecurrency = $update_currency['is_base_currency'];
     if($basecurrency == 0){
       Currency::where('id', $id)->update(array('is_base_currency' => 1));
       Currency::where('id','!=', $id)->update(array('is_base_currency' => 0));
     }
    
     
  
     return redirect('/adm/currencies');
  }



}
