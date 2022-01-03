<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        
        return view('products.index', compact('products'));
    }


    /**
     * For accessing the type of category
     *
     * @return void
     */
    public function type(){
        $cat = Category::all();

        return view('products.create',compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::all();

        return view('products.create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validate=$req->validate([
            'name'=>'required',
            'category'=>'required',
            'price'=>'required',
            'quantity'=>'required',
        ],
        [
            'name.required'=>'This field is manadtory',
            'category.required'=>'This field is manadatory',
            'price.required'=>'This field is manadatory',
            'quantity.required'=>'This field is manadatory'

        ]);
        if($validate){
            $cat=Category::where('id',$req->category)->first();
            Product::insert([
                'name'=>$req->name,
                'type'=>$cat->title,
                'category_id'=>$req->category,
                'price'=>$req->price,
                'quantity'=>$req->quantity,
            ]);
            return redirect('/products')->with('msg', 'Product added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::all();
        $product = Product::findOrFail($id);
        
        return view('products.edit', compact('product','cat')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $cat=Category::where('id',$req->category)->first();
        $validate=$req->validate([
            'name'=>'required',
            'category'=>'required',
            'price'=>'required',
            'quantity'=>'required',
        ],
        [
            'name.required'=>'This field is manadtory',
            'category.required'=>'This field is manadatory',
            'price.required'=>'This field is manadatory',
            'quantity.required'=>'This field is manadatory'

        ]);
        if($validate){
            Product::where('id',$req->uid)->update([
                'name'=>$req->name,
                'type'=>$cat->title,
                'category_id'=>$req->category,
                'price'=>$req->price,
                'quantity'=>$req->quantity,
            ]);
            return redirect('/products')->with('msg', 'Product updated!');
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
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('msg', 'Product deleted!');
    }
}
