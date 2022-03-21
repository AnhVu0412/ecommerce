@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Product PAGE</h3>
        </div>
        <div class="card-body">
            <table style="width: 100%" class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <td style="width: 5%">ID</td>
                    <td style="width: 10%">Category </td>
                    <td style="width: 10%">Name</td>
                    <td style="width: 10%">Selling price</td>
                    <td style="width: 20%">Description</td>
                    <td style="width: 25%">Image</td>
                    <td style="width: 20%">Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $item)
                    <tr>
                        <td style="width: 5%">{{$item ->id}}</td>
                        <td style="width: 10%">{{$item ->category->name}}</td>
                        <td style="width: 10%">{{$item ->name}}</td>
                        <td style="width: 10%">{{$item ->selling_price}}</td>
                        <td style="width: 20%">{{$item ->description}}</td>
                        <td style="width: 25%">
                            <img src="{{asset('public/assets/uploads/product/'.$item->image) }}" alt="Image here" class="admin-fetch-image">
                        </td>
                        <td style="width: 20%">
                            <a href="{{url('edit-product/'.$item->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('delete-product/'.$item->id)}}" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
