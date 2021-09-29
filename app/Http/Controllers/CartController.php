<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
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
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
    public function addTocart(Request $request){

        $purchases = $request->all();
//   dd($purchases);
//check if already in cart
$cartCount=Cart::where(['item_id'=>$purchases['item_id'],'user_id'=>Auth::user()->id])->count();
if($cartCount>0){
    $message = 'item already in cart';
    Session::flash('error_message',$message);
}


        Cart::insert(['category_id'=>$purchases['category_id'],'product_id'=>$purchases['product_id'],'item_id'=>$purchases['item_id'],
        'description'=>$purchases['description'],'quantity'=>$purchases['quantity'],'unitprice'=>$purchases['unitprice'],'warantPeriod'=>$purchases['warantPeriod'],'Serialnumber'=>$purchases['Serialnumber']]);
        $message = 'purchase added to cart successfully';
        Session::flash('success_message',$message);
    }
}
