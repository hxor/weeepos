<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Point;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $customer = Customer::findOrFail($id);
        return view('main.backend.customer.point-create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $point = Point::where('customer_id', $request->customer_id)->orderBy('id', 'desc')->first();
        if ($request->point_out == 0) {
            $data = [
                'customer_id' => $request->customer_id,
                'point_in' => $request->point_in,
                'point_balance' => $point->point_balance + $request->point_in
            ];
            Point::create($data);
            notify()->flash('Berhasil!', 'success', [
                'timer' => 1500,
                'text' => 'Point berhasil ditambah',
            ]);
        } else {
            $data = [
                'customer_id' => $request->customer_id,
                'point_out' => $request->point_out,
                'point_balance' => $point->point_balance - $request->point_out
            ];
            Point::create($data);
            notify()->flash('Berhasil!', 'success', [
                'timer' => 1500,
                'text' => 'Point berhasil ditukar',
            ]);
        }
        return redirect()->route('admin.customer.show', $request->customer_id);
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
        //
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
        //
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
