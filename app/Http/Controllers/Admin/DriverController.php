<?php

namespace App\Http\Controllers\Admin;

use App\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:create_drivers'])->only(['create', 'store']);
        $this->middleware(['permission:read_drivers'])->only(['index']);
        $this->middleware(['permission:update_drivers'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_drivers'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::latest()->paginate(10);
        return view('admin.drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $data = $request->all();
        
        if($request->has('trusted'))
            $data['trusted'] =  true;
        
        $data['password'] = bCrypt($request->password);

        Driver::create($data);

        session()->flash('success', 'Driver created successfully');
        return redirect()->route('admin.drivers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        return view('admin.drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $this->validator($request->all(), $driver)->validate();
        
        $data = $request->except('password');
        
        if($request->has('trusted'))
            $data['trusted'] =  true;
        else 
            $data['trusted'] =  false;
        
        if($request->input('password'))
            $data['password'] = bCrypt($request->password);
        
        $driver->update($data);

        session()->flash('success', 'Driver updated successfully');
        return redirect()->route('admin.drivers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        
        session()->flash('success', 'Driver deleted successfully');
        return redirect()->route('admin.drivers.index');
    }

    public function validator($data, $driver = NULL)
    {   
        $rules = [
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:18|max:90',
            'vehicle' => 'required|string|max:255',
            'vehicle_number' => 'required|string|max:255',
            'phone' => 'required|string|max:11|min:11|unique:drivers' . ($driver? ",phone,$driver->id" : ''),
            'ssn' => 'required|string|max:255|unique:drivers' . ($driver? ",ssn,$driver->id" : ''),
            'trusted' => ""
        ];

        if(request()->input('password') || $driver == NULL)
            $rules['password'] = 'required|min:6|max:255|confirmed';

        return Validator::make($data, $rules);
    }
}
