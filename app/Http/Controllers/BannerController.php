<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Banner::all();

        return view ('banners.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('banners.create');
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
            'heading'=>'required',
            'description'=>'required',
            'image'=>'required',
        ],[
            'heading.required'=>'This field is mandatory',
            'description.required'=>'This field is mandatory',
            'image.required'=>'This field is mandatory',
        ]);
        if($validate){
          $banner=new Banner();
          $banner->heading=$req->input('heading');
          $banner->description=$req->input('description');
          if($req->hasFile('image')){
              $file=$req->file('image');
              $extension=$file->getClientOriginalExtension();
              $filename=time()."-".$extension;
              $file->move("storage/",$filename);
              $banner->image=$filename;

          }
          $banner->status=$req->input('status') ==true ? '1':'0';
          $banner->save();

        }
        return redirect('/banners')->with('msg', 'Banner added!');
        
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
        $data=Banner::findOrFail($id);

        return view('banners.edit',compact('data'));
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
        $validate=$req->validate([
            'heading'=>'required',
            'description'=>'required',
            'image'=>'required',
        ],[
            'heading.required'=>'This field is mandatory',
            'description.required'=>'This field is mandatory',
            'image.required'=>'This field is mandatory',
        ]);
        if($validate){
      
            $banner=Banner::findOrFail($req->id);
           
            $banner->heading=$req->input('heading');
            $banner->description=$req->input('description');
            if($req->hasFile('image')){
                $destination='storage/'.$banner->image;
                if(File::exists($destination)){
                    File::delete($destination);

                }
                $file=$req->file('image');
                $extension=$file->getClientOriginalExtension();
                $filename=time()."-".$extension;
                $file->move('storage',$filename);
                $banner->image=$filename;
  
            }
            $banner->status=$req->input('status') ==true ? '1':'0';
            $banner->save();
  
          }
          return redirect('/banners')->with('msg', 'Banner updated!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect('/banners')->with('msg', 'Banner deleted!');
    }
}
