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
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order->load(['city:name,id', 'seller:name,company_name,id']);
//        return $order;
        return view('admin.orders.show', compact('order'));
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
        $historyStatus = Collect(json_decode($order->history))->map(fn($el) => $el->status);
        $status = Status::findOrFail($request->status_id);

        if($request->status_id != $order->status_id && $historyStatus->contains($status->name)){
            session()->flash('warning', 'You can\'t update order with old status');
            return redirect()->route('admin.orders.index');
        }

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

    public function print(Request $request)
    {
        $request->validate(['orders' => 'required|array|min:1|max:10']);
        
        $orders = Order::whereIn('id', $request->input('orders'))->get();
        return view('admin.orders.show', compact('orders'));
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'items'    => 'required|array|min:1|max:10',
            'statusId' => 'required|exists:statuses,id'
        ]);
        
        $status = Status::findOrFail($request->statusId);

        
        foreach($request->items as $orderId){
            $order = Order::findOrFail($orderId);
            
            $historyStatus = Collect(json_decode($order->history))->map(fn($el) => $el->status);
            
            if($request->status_id != $order->status_id && $historyStatus->contains($status->name)){
                continue;
            } else {
                $order->update(['status_id' => $request->statusId]);
            }
        }
    }
}
