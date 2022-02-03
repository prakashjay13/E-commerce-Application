<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configs = Configuration::all();

        return view('configuration.index', compact('configs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuration.create');
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
            'email_type' => 'required',
            'email' => 'required',

        ], [
            'email_type.required' => 'This field is manadtory',
            'email.required' => 'This field is manadtory',

        ]);
        if ($validate) {
            Configuration::insert([
                'email_type' => $req->email_type,
                'email' => $req->email,

            ]);

            return redirect('/configuration');
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
        $conf = Configuration::findOrFail($id);

        return view('configuration.edit', compact('conf'));
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
        Configuration::where('id', $req->id)->update([
            'email_type' => $req->email_type,
            'email' => $req->email,

        ]);
        return redirect('/configuration')->with('msg', 'Configuration updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delconf = Configuration::findOrFail($id);
        $delconf->delete();

        return redirect('/configuration')->with('msg', 'Configuration deleted!');
    }
}
