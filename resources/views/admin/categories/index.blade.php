@extends('layouts.admin')

@section('content')
    <div class="card">
       <div class="card-header">
            <h3>CATEGORY PAGE</h3>
       </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Image</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $item)
                        <tr>
                            <td>{{$item ->id}}</td>
                            <td>{{$item ->name}}</td>
                            <td>{{$item ->description}}</td>
                            <td>
                                <img src="{{asset('public/assets/uploads/category/'.$item->image) }}" alt="Image here" class="admin-fetch-image">
                            </td>
                            <td>
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
