@extends('layouts.admin')

@section('content')
    <div class="card">
        <h1>Edit Product</h1>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{url('update-product/'.$product->id)}}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select name="cate_id" class="form-select" >
                        <option value="">{{$product->category->name}}</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fname">Name</label>
                    <input type="text" class="form-control" name="name" id="fname" value="{{$product->name}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fslug">Slug</label>
                    <input type="text" class="form-control" name="slug" id="fslug" value="{{$product->slug}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fsmall_description">Small Description</label>
                    <input type="text" class="form-control" name="small_description" id="fsmall_description"
                           value="{{$product->small_description}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="fdes">Description</label>
                    <textarea type="text" class="form-control" name="description" id="fdes">{{$product->description}}"</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fop">Original Price</label>
                    <input type="number" name="original_price" id="fop" value="{{$product->original_price}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fsp">Selling Price</label>
                    <input type="number" name="selling_price" id="fsp" value="{{$product->selling_price}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ftax">Tax</label>
                    <input type="number" name="tax" id="ftax" value="{{$product->tax}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fqty">Quantity</label>
                    <input type="number" name="quantity" id="fqty" value="{{$product->qty}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fstatus">Status</label>
                    <input type="checkbox" name="status" id="fstatus" {{$product->status =='1'?'checked':''}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ftrending">Trending</label>
                    <input type="checkbox" name="trending" id="ftrending" {{$product->trending =='1'?'checked':''}}>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="ftitle">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" id="ftitle" value="{{$product->meta_title}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="fmdes">Meta Description</label>
                    <input type="text" class="form-control" name="meta_description" id="fmdes" value="{{$product->meta_description}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="fkeyword">Meta Keyword</label>
                    <input type="text" class="form-control" name="meta_keyword" id="fkeyword" value="{{$product->meta_keyword}}">
                </div>
                @if($product->image)
                    <img src="{{asset('public/assets/uploads/product/'.$product->image)}}" alt="Imgae here">
                @endif
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
