@extends('layouts.admin')

@section('content')
    <div class="card">
        <h1>Add Category</h1>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{url('insert-categories')}}">
           @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="fname">Name</label>
                    <input type="text" class="form-control" name="name" id="fname">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fslug">Slug</label>
                    <input type="text" class="form-control" name="slug" id="fslug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="fdes">Description</label>
                    <textarea type="text" class="form-control" name="description" id="fdes"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fstatus">Status</label>
                    <input type="checkbox" name="status" id="fstatus">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fpopular">Popular</label>
                    <input type="checkbox" name="popular" id="fpopular">
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
