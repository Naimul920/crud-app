@extends('admin.master')
@section('title')
    PRODUCT MANAGE
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            PRODUCT MANAGE
                        </div>
                        <h4 class="text-success text-center">{{Session::get('message')}}</h4>
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Product Category</th>
                                <th>Product Price</th>
                                <th>Product Description</th>
                                <th>Product Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->product_category}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->product_description}}</td>
                                <td>
                                    <img src="{{asset($product->image)}}" alt="" height="60" width="90"/>
                                </td>
                                <td>
                                    <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('product.delete',['id'=>$product->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
