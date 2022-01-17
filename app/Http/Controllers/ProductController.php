<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Product;
use App\Models\Category;
use App\Models\product_attribute;
use App\Models\product_category;
use App\Models\product_image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::paginate(3);
        return view("products.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view("products.create", compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validateProduct = $request->validate([
                'name'        => 'required',
                'description' => 'required',
                'quantity'    => 'required|numeric',
                'price'       => 'required|numeric',
            ]);

            if ($validateProduct) {
                $name         = $request->name;
                $description  = $request->description;
                $quantity     = $request->quantity;
                $price        = $request->price;
                $productInsertId        = DB::table('products')->insertGetId([

                    'name'       => $name,
                    'description' => $description,
                    'quantity'    => $quantity,
                    'price'       => $price,
                ]);
                if ($productInsertId) {
                    $productAttributeId  = product_attribute::insertGetId([
                        'name'       => $name,
                        'price'      => $price,
                        'quantity'   => $quantity,
                        'product_id' => $productInsertId
                    ]);
                    if ($productAttributeId && $request->hasFile('image')) {
                        $images = $request->file('image');
                        foreach ($images as $i) {
                            $name = rand() . $i->getClientOriginalName();
                            if ($i->move(public_path('storage/'), $name)) {
                                product_image::insert([
                                    'image'      => $name,
                                    'product_id' => $productInsertId,
                                ]);
                            }
                        }
                    }
                }
                DB::table('product_categories')->insert([
                    'category_id' => $request->category,
                    'product_id'  => $productInsertId,
                ]);
                return redirect('/products')->with('msg', 'Successfully inserted data');
            }
        } catch (Exception $e) {
            return back()->with('msg', 'All Fields are required.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::all()->where('id', $id)->first();
        $product_image = product_image::all()->where('product_id', $id);
        $category = Category::all();
        return view('products.edit', compact('data', 'category', 'product_image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = Product::where('id', $request->uid)->update([
                'name'         => $request->name,
                'description'  => $request->description,
                'quantity'     => $request->quantity,
                'price'        => $request->price,
            ]);
            if ($data) {
                product_attribute::where('product_id', $request->uid)->update([
                    'name'       => $request->name,
                    'price'      => $request->price,
                    'quantity'   => $request->quantity,
                ]);
                product_category::where('product_id', $request->uid)->update([
                    'category_id' => $request->category,
                ]);
                if ($request->hasFile('image')) {
                    $deleteImage = product_image::where('product_id', $request->uid)->get();
                    foreach ($deleteImage as $i) {
                        unlink("storage/" . $i->image);
                    }
                    product_image::where('product_id', $request->uid)->delete();
                    $images = $request->file('image');
                    foreach ($images as $i) {
                        $name = rand() . $i->getClientOriginalName();
                        $i->move(public_path('storage/'), $name);
                        product_image::insert([
                            'image'      => $name,
                            'product_id' => $request->uid,
                        ]);
                    }
                }
            }
            return redirect('/products')->with('msg', 'successfully updated data');
        } catch (Exception $e) {
            return back()->with('msg', 'All fields are required.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();

        return redirect('/products')->with('msg', 'Product deleted!');
    }
}
