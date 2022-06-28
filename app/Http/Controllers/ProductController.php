<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    private $products;
    private $product;

    public function index()
    {
        return view('admin.product.add');
    }
    public function manage()
    {
        $this->products= Product::all();
        return view('admin.product.manage',['products'=>$this->products]);
    }
    public function create(Request $request)
    {
        Product::newProduct($request);
        return redirect('add-product/')->with('message','New product create successfull');
    }
    public function edit($id)
    {
        $this->product= Product::find($id);
        return view('admin.product.edit',['product'=>$this->product]);
    }
    public function update(Request $request,$id)
    {
        Product::updateProduct($request,$id);
        return redirect('manage-product/')->with('message','Product update successfull');
    }
}
