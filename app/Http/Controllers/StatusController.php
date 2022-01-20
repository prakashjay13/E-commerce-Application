<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * For showing order data
     *
     * @return void
     */
    public function order()
    {
        $order = Order::paginate(6);

        return view('orders.order', compact('order'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editstatus($id)
    {
        $order = Order::findOrFail($id);

        return view('orders.editstatus', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatestatus(Request $req)
    {
        Order::where('id', $req->id)->update([
            'status' => $req->status,
            'tracking_id' => $req->tracking_id
        ]);
        return redirect('/order');
    }
}
