@extends('layouts.frontend')

@section('title')
    Categories
@endsection

@section('content')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>All Category</h2>
                <div class="col-md-12">
                        <div class="row">
                            @foreach($category as $cate)
                                <div class="col-md-3 mb-3">
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
