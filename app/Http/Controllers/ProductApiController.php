<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Banner;
use App\Models\Category;
use App\Http\Resources\EcommResource;
use App\Models\product_attribute;
use App\Models\product_category;
use App\Models\product_image;
use App\Models\Order;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function product()
    {
        $product = Product::with(['ProductImage', 'ProductCategory'])->get();
        $product_image = product_image::all();
        $product_cat = product_category::all();
        $product_attr = product_attribute::all();

        return response(['product' => $product, 'product_image' => $product_image, 'product_category' => $product_cat, 'product_attribute' => $product_attr, 'err' => 0]);
    }

    public function banner()
    {
        $banner = Banner::all();

        return response(['banner' => EcommResource::collection($banner), 'err' => 0]);
    }

    public function category()
    {
        $category = Category::all();

        return response(['category' => EcommResource::collection($category), 'err' => 0]);
    }

    public function catpro($id)
    {
        $product = product_category::where('category_id', $id)->get();

        return response(['product' => EcommResource::collection($product), 'err' => 0]);
    }


    public function order($id)
    {
        $user = User::where('email', $id)->first();
        $order = Order::where('user_id', $user->id)->get();

        return response(['order' => EcommResource::collection($order), 'err' => 0]);
    }

    public function track($id)
    {

        $order = Order::where('tracking_id', $id)->get();

        return response(['track' => EcommResource::collection($order), 'err' => 0]);
    }
}
