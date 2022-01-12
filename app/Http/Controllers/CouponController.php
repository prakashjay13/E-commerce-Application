<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();

        return view('coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Coupon::all();

        return view('coupons.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'code' => 'required|min:4',
                'type' => 'required',
                'value' => 'required'
            ],
            [
                'code.required' => 'Please enter the code',
                'type.required' => 'Please select the type',
                'value.required' => 'Please enter the value',
            ]
        );
        if ($validateData) {
            $coupon = new Coupon();
            $code = $request->code;
            $type = $request->type;
            $value = $request->value;
            $coupon->code = $code;
            $coupon->type = $type;
            $coupon->value = $value;
            if ($coupon->save()) {

                return redirect('/coupons')->with('msg', 'Coupon added!');
            } else {

                return back()->with('msg', 'Error adding coupon');
            }
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
        $coupons = Coupon::findOrFail($id);

        return view('coupons.edit', compact('coupons'));
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
        Coupon::where('id', $id)->update([
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value
        ]);
        return redirect('/coupons')->with('msg', 'Coupon updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
