@extends('layouts.frontend')

@section('title')
    {{$products->name}}
@endsection

@section('content')
    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{asset('public/assets/uploads/product/'.$products->image)}}"class="w-100">
                    </div>
                    <div class="col-md-8">
                        <input type="hidden" value="{{$products->name}}" class="product_name">
                        <h2 class="mb-0">
                            {{$products->name}}
                            <label style="font-size: 16px" class="float-end badge bg-danger trending_tag">{{$products->trending == '1'?'trending':''}}</label>
                        </h2>
                        <hr>
                        <label class="me-3">Original Price: <s>{{$products->original_price}}</s></label>
                        <label class="fw-bold">Selling Price: {{$products->selling_price}}</label>
                        <p class="mt-3">
                            {!! $products -> small_description !!}
                        </p>
                        <hr>
                        @if($products->qty>0)
                            <label class="badge bg-success">In stock</label>
                        @else
                            <label class="badge bg-danger">Out of stock</label>
                            @endif
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="hidden" value="{{$products->id}}" class="product_id">
                                <label for="quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity " value="1" class="form-control qty-input text-center">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br/>
                                <button type="button" class="btn btn-primary me-3 float-start addToCartBtn">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function (){

            $('.addToCartBtn').click(function (e){
                e.preventDefault();

                var product_name = $(this).closest('.product_data').find('.product_name').val();
                var product_id = $(this).closest('.product_data').find('.product_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty-input').val();
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url:"/add-to-cart",
                    data:{
                        'product_name':product_name,
                        'product_id':product_id,
                        'product_qty':product_qty
                    },
                    success: function (response){
                        alert(response.status);
                    }
                })
            });

            $('.increment-btn').click(function (e){
                e.preventDefault();
                var inc_value = $('.qty-input').val();
                var value = parseInt(inc_value,10);
                value = isNaN(value) ? 0 : value;
                if(value<10){
                    value++
                    $('.qty-input').val(value)
                }
            });
            $('.decrement-btn').click(function (e){
                e.preventDefault()
                var dec_value = $('.qty-input').val();
                var value = parseInt(dec_value,10);
                value = isNaN(value) ? 0 : value;
                if(value>1){
                    value--
                    $('.qty-input').val(value)
                }
            });
        })
    </script>
@endsection
