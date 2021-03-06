<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $product;
    private static $products;
    private static $imageName;
    private static $directory;
    private static $imageUrl;

    public static function getImageUrl($image)
    {
        self::$imageName=$image->getClientOriginalName();
        self::$directory='product-image/';
        $image->move(self::$directory, self::$imageName);
        self::$imageUrl=self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newProduct($request)
    {
        self::$product=new Product();
        self::$product->name=$request->name;
        self::$product->product_category=$request->product_category;
        self::$product->price=$request->price;
        self::$product->product_description=$request->product_description;
        self::$product->image=self::getImageUrl($request->file('image'));
        self::$product->save();
    }
    public static function updateProduct($request,$id)
    {
        self::$product= Product::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
           self::$imageUrl=self::getImageUrl($request->file('image'));
        }
        else
        {
            self::$imageUrl=self::$product->image;
        }
        self::$product->name=$request->name;
        self::$product->product_category=$request->product_category;
        self::$product->price=$request->price;
        self::$product->product_description=$request->product_description;
        self::$product->image=self::$imageUrl;
        self::$product->save();
    }
    public static function deleteProduct($id)
    {
        self::$product=Product::find($id);
        if (file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self::$product->delete();
    }
}
