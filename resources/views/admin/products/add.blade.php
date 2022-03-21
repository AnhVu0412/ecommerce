@extends('layouts.admin')

@section('content')
    <div class="card">
        <h1>Add Product</h1>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{url('insert-product')}}">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select name="cate_id" class="form-select" >
                        <option value="">Select Category</option>
                        @foreach($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fname">Name</label>
                    <input type="text" class="form-control" name="name" id="fname">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fslug">Slug</label>
                    <input type="text" class="form-control" name="slug" id="fslug">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fsmall_description">Small Description</label>
                    <input type="text" class="form-control" name="small_description" id="fsmall_description">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="fdes">Description</label>
                    <textarea type="text" class="form-control" name="description" id="fdes"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fop">Original Price</label>
                    <input type="number" name="original_price" id="fop">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fsp">Selling Price</label>
                    <input type="number" name="selling_price" id="fsp">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ftax">Tax</label>
                    <input type="number" name="tax" id="ftax">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fqty">Quantity</label>
                    <input type="number" name="quantity" id="fqty">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fstatus">Status</label>
                    <input type="checkbox" name="status" id="fstatus">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ftrending">Trending</label>
                    <input type="checkbox" name="trending" id="ftrending">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="ftitle">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" id="ftitle">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="fmdes">Meta Description</label>
                    <input type="text" class="form-control" name="meta_description" id="fmdes">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="fkeyword">Meta Keyword</label>
                    <input type="text" class="form-control" name="meta_keyword" id="fkeyword">
                </div>
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
