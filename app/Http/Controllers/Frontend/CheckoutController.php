<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $cartItem = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout',compact('cartItem'));
    }

    public function placeorder(Request $request){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->city = $request->input('city');
        $order->address = $request->input('address');
        $order->country = $request->input('country');
        $order->tracking_no = 'ITDF'.rand(111,999);

        $order->payment_mode = $request->input('payment_mode');
        $order->payment_id = $request->input('payment_id');
        $total = 0;
        $cartitems_total = Cart::where('user_id',Auth::id())->get();
        foreach ($cartitems_total as $prd){
            $total += $prd->products->selling_price * $prd->prod_qty;
        }
        $order->total_price = $total;
        $order->save();


        $cartitem = Cart::where('user_id',Auth::id())->get();
        foreach ($cartitem as $item){
            OrderItem::create([
//               'order_id' => $item->id,
                'order_id' => $order->id,
                'prod_id' =>$item->prod_id,
                'qty' => $item->prod_qty,
                'price' =>$item->products->selling_price,
            ]);
        }

        $cartitem = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitem);

        if($request->input('payment_mode')=="Paid by paypal"){
            return response()->json(['status' => "Order place successfully"]);
        }

        return redirect('/')->with('status',"Orderd place succesfully");
    }
}
