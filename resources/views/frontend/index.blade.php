@extends('layouts.frontend')

@section('title')
    ITDFootball shop
@endsection

@section('content')
    @include('layouts.inc.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Product</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($featured_products as $prod)
                    <div class="item">
                        <div class="card" style="height: 350px">
                            <img height="70%" src="{{ asset('public/assets/uploads/product/'.$prod->image) }}" alt="Product Image">
                            <div class="card-body" style="height: 30%">
                               <h5>{{$prod -> name}}</h5>
                                <span class="float-start">{{$prod->selling_price}}</span>
                                <span class="float-end"><s>{{$prod->original_price}}</s></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>All Category</h2>
                <div class="col-md-12">
                    <div class="owl-carousel category-carousel owl-theme">
                        @foreach($category as $cate)
                            <div class="item">
                                <a href="{{url('view-category/'.$cate->slug)}}">
                                    <div class="card" style="height: 350px">
                                        <img height="70%" src="{{ asset('public/assets/uploads/category/'.$cate->image) }}" alt="Category Image">
                                        <div class="card-body" style="height: 30%">
                                            <h5>{{$cate -> name}}</h5>
                                            <p>{{{$cate ->description}}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
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
    <script>
        $('.category-carousel').owlCarousel({
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
