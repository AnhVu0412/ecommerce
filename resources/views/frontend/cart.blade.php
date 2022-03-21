@extends('layouts.frontend')

@section('title')
    My Cart
@endsection

@section('content')
    <div class="container my-5">
        <div class="card shadow ">
            <div class="card-body">
                @foreach( $cartItems as $item)
                <div class="row product_data ">
                    <div class="col-md-2">
                        <img src="{{asset('public/assets/uploads/product/'.$item->products->image)}}" height="150px" width="150px">
                    </div>
                    <div class="col-md-5">
                        <h6>{{$item ->prod_name}}</h6>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" class="prod_id" value="{{$item ->prod_id}}">
                        <label for="quantity">Quantity</label>
                        <div class="input-group text-center mb-3">
                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                            <input type="text" name="quantity " value="{{$item -> prod_qty}}" class="form-control qty-input text-center">
                            <button class="input-group-text changeQuantity increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash "></i>Remove</button>
                    </div>
                </div>
                   @php
                       $total = 0;
                      /** @var TYPE_NAME $item */
                        $total += $item->products->selling_price * $item->prod_qty;
                   @endphp

                @endforeach
            </div>
                <div class="card-footer">
                    <h5>Total Price {{$total}}</h5>
                </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function (){

            $('.increment-btn').click(function (e){
                e.preventDefault();
                var inc_value = $(this).closest('.product_data').find('.qty-input').val();
                var value = parseInt(inc_value,10);
                value = isNaN(value) ? 0 : value;
                if(value<10){
                    value++
                    $(this).closest('.product_data').find('.qty-input').val(value)
                }
            });

            $('.decrement-btn').click(function (e){
                e.preventDefault()
                var dec_value = $(this).closest('.product_data').find('.qty-input').val();
                var value = parseInt(dec_value,10);
                value = isNaN(value) ? 0 : value;
                if(value>1){
                    value--
                    $(this).closest('.product_data').find('.qty-input').val(value)
                }
            });

            $('.delete-cart-item').click(function (e){
                e.preventDefault();
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
                var prod_id = $(this).closest('.product_data').find('.prod_id').val();
                $.ajax({
                    method: "post",
                    url:"delete-cart-item",
                    data:{
                        'prod_id':prod_id,
                    },
                    success: function (response){
                        window.location.reload();
                        swal("",response.status,"success");
                    }
                })
            })
        })
    </script>
@endsection

