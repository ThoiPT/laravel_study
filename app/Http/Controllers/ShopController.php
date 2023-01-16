<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ShopController extends Controller
{
    public function index()
    {
        $shop = Shop::all();
        $product = Product::all();
        $array_compact = [
            'shop' => $shop,
            'product' => $product
        ];
        return view("Shop.index", $array_compact);
    }

    public function store(Request $request)
    {
        $shop_name = $request->name; // Get input name in view blade
        $create = Shop::create(['name' => $shop_name]);
        if($create){
            dd("Success");
        }else{
            dd("Failed");
        }
    }

    public function addProduct($id)
    {
        $shop_info = Shop::find($id);
        $shop = Shop::all();

        // dd($shop_name->name);
        $product = Product::all();
        $product_checked = $shop_info->products;
        // dd($product_checked);
        $array_compact = [
            'product' => $product,
            'shop_info' => $shop_info,
            'shop' => $shop,
            'product_checked' => $product_checked,
        ];
        return view("Shop.add_product",$array_compact);
    }

    public function storeProduct(Request $request, $id)
    {
        $shop_info = Shop::find($id); // Find id shop
        $listProduct = $request->name; // List of Product - Choose
        if($shop_info->products()->syncWithoutDetaching($listProduct)){
           return redirect()->back();
        }else{
            dd("fial");
        }
    }

    public function deleteProduct(Request $request, $id)
    {
        $shop_info = Shop::find($id);
        $product_choose = $request->name; // ID sản phẩm cần xóa
        $shop_info->products()->detach($product_choose);
        return redirect()->back();
    }
}
