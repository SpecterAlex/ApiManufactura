<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Customer::paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $customer = Customer::create($request->all());
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond($customer));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customer->load(['addresses.suburb.zipcode.city.state']);
        return response()->json($this->respond($customer));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        try
        {
            $customer->update($request->all());
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond($customer));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        try
        {
            $result = $customer->delete();
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond(null,"success","Customer Deleted!"));
    }
}
