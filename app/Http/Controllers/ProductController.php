<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;

class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::all();
        return view('shop.index', ['products' => $products]);
    }

    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('product.index');
    }

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items)>0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart', $cart);
        }
        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items)>0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart', $cart);
        }
        return redirect()->route('product.shoppingCart');
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }

    public function getCheckout(){
        
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $cart = Session::get('cart');
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total'=>$total]);
    }

    public function postCheckout(Request $request){
        if(!Session::has('cart')){
            return redirect()->route('product.shoppingCart');
        }
        $cart = Session::get('cart');
        Stripe::setApiKey('sk_test_YOURKEY');
        try{
            $chargeResponse = Charge::create(array(
                "amount" => $cart->totalPrice * 100, //default is cent, thats why multiplying wtih 100
                "currency" => "sgd",
                "source" => $request->input('stripeToken'), //post data from checkout.js form, obtained by stripe.js
                "description" => "Charge for testing purpose"
            ));
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $chargeResponse->id;
            //Auth::id(); //getting current userId
            Auth::user()->orders()->save($order); //instead of assigning user_id, we are saving to order table, "orders" here is the relationship between user and order
        }catch(\Exception $e){
            return redirect()->route('checkout')->with('error', $e)->with('debug', $request);
        }
        
        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
    }
}
