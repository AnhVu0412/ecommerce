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
                        <h4>Order View</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                <div class="border p-2">{{ $orders->name }}</div>
                                <label>Email</label>
                                <div class="border p-2">{{ $orders->email }}</div>
                                <label>Phone</label>
                                <div class="border p-2">{{ $orders->phone }}</div>
                                <label>Shipping address</label>
                                <div class="border p-2">{{ $orders->address }},{{$orders->city}},{{$orders->country}}</div>

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
                                        @foreach($orders->orderitems as $item )
                                            <tr>
                                                <td>{{$item->products->name}}</td>
                                                <td>{{$item->qty}}</td>
                                                <td>{{$item->price}}</td>
                                                <td>
                                                    <img src="{{asset('public/assets/uploads/product/'.$item->products->image)}}" width="50px">
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <h4>Grand Total: {{$orders->total_price}}</h4>
                                    <h4>Payment Mode: {{$orders->payment_mode}}</h4>
                                    <h5>Bill: {{$orders->payment_id}} </h5>

                                    <label for="">Order Status</label>
                                    <form action="{{url('update-status/'.$orders->id)}}" method="post">
                                        @csrf
                                        @method('put')
                                    <select class="form-select" name="order_status">
                                        <option {{$orders->status =='0'?'selected':''}} value="0">Pending</option>
                                        <option {{$orders->status=='1'?'selected':''}}value="1">Completed</option>
                                    </select>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
