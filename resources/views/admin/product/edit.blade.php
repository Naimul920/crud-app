@extends('admin.master')
@section('title')
    EDIT PRODUCT
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            PRODUCT EDIT
                        </div>
                        <h4 class="text-success text-center">{{Session::get('message')}}</h4>
                        <form action="{{route('product.update',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row mt-2">
                                    <label for="" class="col-md-3">Product Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control" value="{{$product->name}}">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="" class="col-md-3">Product Category</label>
                                    <div class="col-md-9">
                                        <input type="text" name="product_category" class="form-control" value="{{$product->product_category}}">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="" class="col-md-3">Price</label>
                                    <div class="col-md-9">
                                        <input type="number" name="price" class="form-control" value="{{$product->price}}">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="" class="col-md-3">Product Description</label>
                                    <div class="col-md-9">
                                        <textarea name="product_description" class="form-control">{{$product->product_description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="" class="col-md-3">Image</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" class="form-control">
                                        <img src="{{asset($product->image)}}" alt="" height="80" width="80">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-outline-primary px-5" value="Update Product">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
