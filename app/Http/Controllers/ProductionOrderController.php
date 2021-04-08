<?php

namespace App\Http\Controllers;

use App\Models\ProductionOrder;
use Illuminate\Http\Request;

class ProductionOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ProductionOrder::paginate(15));
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
            $productionOrder = ProductionOrder::create($request->all());
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond($productionOrder));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionOrder  $productionOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionOrder $productionOrder)
    {
        $productionOrder->load(['user.productionorder.productionstation.productionstatus.productionline.customer.addresses.suburb.zipcode.city.state']);
        return response()->json($this->respond($productionOrder));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionOrder  $productionOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionOrder $productionOrder)
    {
        try{
            $productionOrder->update($request->all());
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond($productionOrder));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionOrder  $productionOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionOrder $productionOrder)
    {
        try
        {
            $result = $productionOrder->delete();
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond(null,"success","Production Order Deleted!"));
    }
}
