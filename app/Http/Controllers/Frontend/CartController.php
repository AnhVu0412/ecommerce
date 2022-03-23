<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        $product_name = $request ->input('product_name');

        if(Auth::check()){
            $prod_check = Product::where('id',$product_id)->first();
            if($prod_check){
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
                    return response()->json(['status'=> $prod_check->name . "Already added to cart"]);
                }else {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->prod_name = $product_name;
                    $cartItem->user_id = Auth::id();
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name . "Added to cart"]);
                }
            }
        }else{
            return response()->json(['status' => "Login to continue"]);
        }
    }

    public function viewCart(){
        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cartItems'));
    }

    public function delete  ( Request $request){
        if(Auth::check()){
            $prod_id = $request->input('prod_id');
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
                $cartItem = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status'=>"Product deleted successfully"]);
            }

        }else{
            return response()->json(['status'=>"Login to continue"]);
        }
    }

    public function update( Request  $request){
        $prod_id = $request -> input('prod_id');
        $prod_qty = $request -> input('prod_qty');

        if(Auth::check()){
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $cart = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cart->prod_qty = $prod_qty;
                $cart->update();
                return response()->json(['status' => "Quantity updated"]);
            }
        }
        else{
            return response()->json(['status'=>"Login to continue"]);
        }
    }
}
