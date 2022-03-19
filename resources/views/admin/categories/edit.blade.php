@extends('layouts.admin')

@section('content')
    <div class="card">
        <h1>Edit Category</h1>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{url('update-category/'.$category->id)}}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="fname">Name</label>
                    <input type="text" class="form-control" name="name" id="fname" value="{{$category->name}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fslug">Slug</label>
                    <input type="text" class="form-control" name="slug" id="fslug" value="{{$category->slug}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="fdes">Description</label>
                    <textarea type="text" class="form-control" name="description" id="fdes" >{{$category->description}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fstatus">Status</label>
                    <input type="checkbox" name="status" id="fstatus" {{$category->status =='1'? 'checked':''}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fpopular">Popular</label>
                    <input type="checkbox" name="popular" id="fpopular" {{$category->popular =='1'? 'checked':''}}>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="ftitle">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" id="ftitle" value="{{$category->meta_title}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="fmdes">Meta Description</label>
                    <input type="text" class="form-control" name="meta_description" id="fmdes" value="{{$category->meta_description}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="fkeyword">Meta Keyword</label>
                    <input type="text" class="form-control" name="meta_keyword" id="fkeyword" value="{{$category->meta_keyword}}">
                </div>
                @if($category->image)
                    <img width="250px" src="{{asset('public/assets/uploads/category/'.$category->image)}}" alt="Here is image">
                @endif
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
