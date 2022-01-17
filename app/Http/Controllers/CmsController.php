<?php

namespace App\Http\Controllers;

use App\Models\Cms;

use Illuminate\Http\Request;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cms::all();

        return view('cms.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validate = $req->validate([
            'title' => 'required',
            'body' => 'required',

        ], [
            'title.required' => 'This field is manadtory',
            'body.required' => 'This field is manadtory',

        ]);
        if ($validate) {
            Cms::insert([
                'title' => $req->title,
                'body' => $req->body,

            ]);

            return redirect('/cms');
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
        $cms = Cms::findOrFail($id);

        return view('cms.edit', compact('cms'));
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
        Cms::where('id', $req->id)->update([
            'title' => $req->title,
            'body' => $req->body,

        ]);
        return redirect('/cms')->with('msg', 'Cms updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cms = Cms::findOrFail($id);
        $cms->delete();

        return redirect('/cms')->with('msg', 'Cms deleted!');
    }
}
