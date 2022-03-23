

@extends('layouts.frontend');


@section('title')
    Checkout
@endsection

@section('content')
    <div class="container mt-5">
        <form method="post" action="{{url('place-order')}}">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" name="email">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Phone number</label>
                                    <input type="text" class="form-control" name="phone" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" name="city" value="{{\Illuminate\Support\Facades\Auth::user()->city}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{\Illuminate\Support\Facades\Auth::user()->address}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control" name="country" value="{{\Illuminate\Support\Facades\Auth::user()->country}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Detail</h6>
                            <hr>
                            @if($cartItem->count() > 0)
                                @php $total = 0; @endphp
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($cartItem as $item)
                                        <tr>
                                            <td>{{$item->products->name}}</td>
                                            <td>{{$item->prod_qty}}</td>
                                            <td>{{$item->products->selling_price}}</td>
                                        </tr>
                                        @php

                                            /** @var TYPE_NAME $item */
                                              $total += $item->products->selling_price * $item->prod_qty;
                                        @endphp
                                    @endforeach
                                </tbody>
                                <hr>
                                <h5>Total Price {{$total}}</h5>
                            </table>
                            <button type="submit" class="btn btn-primary w-100">Order</button>
                        </div>
                        @else
                            <div class="card-body text-center">
                                <h2>Your cart is empty</h2>
                                <a href="{{url('category')}}" class="btn btn-outline-primary float-end">Continue shopping</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
