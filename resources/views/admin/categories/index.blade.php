@extends('layouts.admin')

@section('content')
    <div class="card">
       <div class="card-header">
            <h3>CATEGORY PAGE</h3>
       </div>
        <div class="card-body">
            <table style="width: 100%" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <td style="width: 8%">ID</td>
                        <td style="width: 20%">Name</td>
                        <td style="width: 25%">Description</td>
                        <td style="width: 25%">Image</td>
                        <td style="width: 20%">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $item)
                        <tr>
                            <td style="width: 8%">{{$item ->id}}</td>
                            <td style="width: 20%">{{$item ->name}}</td>
                            <td style="width: 25%">{{$item ->description}}</td>
                            <td style="width: 25%">
                                <img src="{{asset('public/assets/uploads/category/'.$item->image) }}" alt="Image here" class="admin-fetch-image">
                            </td>
                            <td style="width: 25%">
                                <a href="{{url('edit-category/'.$item->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{url('delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
