@extends('layouts.frontend')

@section('title')
    My Orders
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                <div class="border p-2">{{ $order->name }}</div>
                                <label>Email</label>
                                <div class="border p-2">{{ $order->email }}</div>
                                <label>Phone</label>
                                <div class="border p-2">{{ $order->phone }}</div>
                                <label>Shipping address</label>
                                <div class="border p-2">{{ $order->address }},{{$order->city}},{{$order->country}}</div>

                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <table class="table table-bordered text-center">
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                        <tbody>
                                            @foreach($order->items as $item )
                                                <tr>
                                                    <td>{{$item->products->name}}</td>
                                                    <td>{{$item->prod_qty}}</td>
                                                    <td>{{$item->price}}</td>
                                                    <td>
                                                        <img src="{{asset('public/assets/uploads/product/'.$item->products->image)}}" width="50px">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <h4>Grand Total: {{$order->total_price}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
