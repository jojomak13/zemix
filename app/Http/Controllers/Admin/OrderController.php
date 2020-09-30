<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Order;
use App\Driver;
use App\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderUpdateRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderDataTable $datatable)
    {
        return $datatable->render('admin.orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Display order history.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function history(Order $order)
    {
        return json_decode($order->history);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $order->load('seller:name,id');
        $cities = City::select('name', 'id')->get();
        $statues = Status::select('name', 'id')->get();
        $drivers = Driver::select('name', 'id')->get();

        return view('admin.orders.edit', compact('order', 'cities', 'statues', 'drivers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderUpdateRequest $request, Order $order)
    {
        $order->update($request->all());

        session()->flash('success', 'Order updated successfully');
        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        session()->flash('success', 'Order deleted successfully');
        return redirect()->route('admin.orders.index');
    }
}
