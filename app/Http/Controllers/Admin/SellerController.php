<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SellerController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:create_sellers'])->only(['create', 'store']);
        $this->middleware(['permission:read_sellers'])->only(['index']);
        $this->middleware(['permission:update_sellers'])->only(['edit', 'update', 'activate']);
        $this->middleware(['permission:delete_sellers'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::latest()->with('city:id,name')->paginate(5);
        return view('admin.sellers.index', compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::select('name', 'id')->get();
        return view('admin.sellers.create', compact('cities'));
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
        $data['password'] = bCrypt($request->password);
        $data['is_active'] = true;

        Seller::create($data);

        session()->flash('success', 'Seller created successfully');
        return redirect()->route('admin.sellers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        $cities = City::select('name', 'id', 'shipping_price')->get();
        $seller->load('prices');

        return view('admin.sellers.edit', compact('seller', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        $this->validator($request->all(), $seller)->validate();
        
        $data = $request->except('password');
        
        if($request->input('password'))
            $data['password'] = bCrypt($request->password);
        
        $seller->syncCitiesShipping($request->prices, $request->cities);

        $seller->update($data);

        session()->flash('success', 'Seller updated successfully');
        return redirect()->route('admin.sellers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        $seller->delete();

        session()->flash('success', 'Seller deleted successfully');
        return redirect()->route('admin.sellers.index');
    }
    
    public function activate(Seller $seller)
    {
        if($seller->is_active){
            $seller->update(['is_active' => false]);
            session()->flash('success', 'Seller blocked successfully');
        } else {
            $seller->update(['is_active' => true]);
            session()->flash('success', 'Seller activated successfully');
        }

        return redirect()->route('admin.sellers.index');
    }

    public function validator($data, $seller = NULL)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|unique:sellers' . ($seller? ",email,$seller->id" : ''),
            'phone' => 'required|string|max:11|min:11|unique:sellers' . ($seller? ",phone,$seller->id" : ''),
            'address' => 'required|string|max:255',
            'city_id' => 'required'
        ];

        if(request()->input('password') || $seller == NULL)
            $rules['password'] = 'required|min:6|max:255|confirmed';

        return Validator::make($data, $rules);
    }
}
