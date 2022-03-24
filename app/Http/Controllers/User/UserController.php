<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myOrder(){
        $orders = Order::where('user_id',Auth::id())->get();
        return view('frontend.orders.index',compact('orders'));
    }

    public function viewOrder($id){
        $order = Order::where('id', $id)->where('user_id',Auth::id())->first();
        return view('frontend.orders.view',compact('order'));
    }
}
