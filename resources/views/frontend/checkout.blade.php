

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
                                    <input type="text" class="form-control name" name="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                    <span id="name" class="text-danger"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" name="email">
                                    <span id="eamil" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Phone number</label>
                                    <input type="text" class="form-control phone " name="phone" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}">
                                    <span id="phone" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">City</label>
                                    <input type="text" class="form-control city " name="city" value="{{\Illuminate\Support\Facades\Auth::user()->city}}">
                                    <span id="city" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control address" name="address" value="{{\Illuminate\Support\Facades\Auth::user()->address}}">
                                    <span id="address" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control country" name="country" value="{{\Illuminate\Support\Facades\Auth::user()->country}}">
                                    <span id="country" class="text-danger"></span>
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
                            <input type="hidden" name="payment_mode" value="COD">
                            <input type="hidden" name="payment_id" value="COD">
                            <button type="submit" class="btn btn-primary w-100">Place Order | COD</button>
                                <div id="paypal-button-container"></div>

                        @else
                            <div class="card-body text-center">
                                <h2>Your cart is empty</h2>
                                <a href="{{url('category')}}" class="btn btn-outline-primary float-end">Continue shopping</a>
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=AWnd7BUzU6F-5hsv0hUCKDNRd_Epf7ISl_ngPDTkiNwfxEwvXmDDqrO_qMIXK6f6_D0-NXboSXeJe0w_"></script>

    <script>
        paypal.Buttons({

            // Sets up the transaction when a payment button is clicked
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{$total}}' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                        }
                    }]
                });
            },

            // Finalize the transaction after payer approval
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    // var transaction = orderData.purchase_units[0].payments.captures[0];
                    // alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                    var name = $('.name').val();
                    var email = $('.email').val();
                    var phone = $('.phone').val();
                    var address = $('.address').val();
                    var city = $('.city').val();
                    var country = $('.country').val();

                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method: "POST",
                        url: "/place-order",
                        data: {
                            'name':name,
                            'email': email,
                            'phone': phone,
                            'address': address,
                            'city': city,
                            'country': country,
                            'payment_mode':"Paid by paypal",
                            'payment_id': orderData.id,
                        },
                        success: function (response){
                            alert(response.status);
                            window.location.href = "/my-order"
                        }
                    })

                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // var element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }
        }).render('#paypal-button-container');

    </script>
@endsection
