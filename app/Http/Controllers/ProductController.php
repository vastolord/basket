<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product=Product::all();

        $category=Category::pluck('name','id')->all();
        return view('wel',compact('product','category'));
        Session::put('oldurl',$request->url());
        //$request->session()->put('oldurl',$request->url());
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $product=Product::find($id);
        $oldcart=Session::has('cart') ? Session::get('cart'):null;
        $cart=new Cart($oldcart);
        $cart->add($product,$product->id);
        $request->session()->put('cart',$cart);
        //dd(Session::get('cart'));
        //$request->session()->flush();



        return redirect('/');
    }
    public function getCart()
    {
             if(!Session::has('cart')){
                 return view('cart.cart');
             }
        $oldcart=Session::get('cart');
        $cart=new Cart($oldcart);
        return view('cart.cart',['products'=>$cart->items,'totalprice'=>$cart->totalPrice]);

    }
    public function getCheckout()
    {
        if(!Session::has('cart')){
            return view('cart');
        }
        $oldcart=Session::get('cart');
        $cart=new Cart($oldcart);
        $total=$cart->totalPrice;
        return view('cart.checkout',['total'=>$total]);

    }
    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return view('cart');
        }
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        //$request->session()->put('error');

        Stripe::setApiKey('sk_test_qqPRy8Z5Z8h46fPcdnfINEZS');

        try {
            $token = $request->input('stripeToken');
            $charge=Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $token, //$request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Charge for isabella.anderson@example.com"
            ));
            $order=new Order();
            $order->cart=serialize($cart);
            $order->address=$request->input('address');
            $order->name=$request->input('name');
            $order->payment_id=$charge->id;
            $order->stock=$cart->totalQty;
            Auth::User()->orders()->save($order);

         /*   $product=Product::find($cart->items->id);
            $product->stock=$cart->totalQty;
            $product->update($product);

            */



        }catch (\Exception $e){

            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('checkout.done')->with('success', 'successfully purchased');

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
