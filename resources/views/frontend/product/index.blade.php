@extends('layouts.frontend')

@section('title')
    Products
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{$category->name}}</h2>
                    @foreach($product as $prod)
                        <div class="col-md-3 mb-3">
                            <a href="{{url('category/'.$category->slug.'/'.$prod->slug)}}">
                            <div class="card" style="height: 350px">
                                <img height="70%" src="{{ asset('public/assets/uploads/product/'.$prod->image) }}" alt="Product Image">
                                <div class="card-body" style="height: 30%">
                                    <h5>{{$prod -> name}}</h5>
                                    <span class="float-start">{{$prod->selling_price}}</span>
                                    <span class="float-end"><s>{{$prod->original_price}}</s></span>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
