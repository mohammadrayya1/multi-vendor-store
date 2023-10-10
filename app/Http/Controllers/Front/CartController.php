<?php

namespace App\Http\Controllers\Front;

use App\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Cart\CartModelRepository;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{

    protected $cart;


    public function __construct(CartRepository $cart)
    {
        $this->cart=$cart;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Cart $cart)
    {

        return view('front.cart',['cart'=>$cart]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Cart $cart)
    {
        $request->validate([
            'product_id'=>['required','int','exists:products,id'],
            'quantity'=>['nullable','int','min:1']
        ]);

        $product=Product::findOrFail($request->product_id);
    if (!$request->quantity){
        $request->quantity=1;
    }
       $cart::add($product,$request->quantity);

        return Redirect::route ("carts.index")->with('crud', 'product is added To Cart  Successfully');


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
    public function update(Request $request,$id ,Cart $cart)
    {
        $request->validate([
            'quantity'=>['required','int','min:1']
        ]);


        $cart::update($id,$request->quantity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->cart->delete($id);


    }
}
