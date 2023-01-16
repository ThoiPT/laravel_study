<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view("Product.index");
    }

    public function store(Request $request)
    {
        $product_name = $request->name; // Get input name in view blade
        $create = Product::create(['name' => $product_name]);
        if($create){
            dd("Success product");
        }else{
            dd("Failed produtrc");
        }
    }
}
