@extends('layouts.frontend')

@section('title')
    ITDFootball shop
@endsection

@section('content')
    @include('layouts.inc.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($featured_products as $prod)
                    <div class="items">
                        <div class="card" >
                            <img src="{{ asset('public/assets/uploads/product/'.$prod->image) }}" alt="Product Image">
                            <div class="card-body">
                               <h5>{{$prod -> name}}</h5>
                                <small>{{$prod->selling_price}}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>
@endsection
