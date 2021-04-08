<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(OrderProduct::paginate(15));
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
            $orderProduct = OrderProduct::create($request->all());
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond($orderProduct));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function show(OrderProduct $orderProduct)
    {
        $orderProduct->load(['product.order.user.productionorder.productionstation.productionstatus.customer.addresses.suburb.zipcode.city.state']);
        return response()->json($this->respond($orderProduct));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderProduct $orderProduct)
    {
        try{
            $orderProduct->update($request->all());
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond($orderProduct));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderProduct $orderProduct)
    {
        try
        {
            $result = $orderProduct->delete();
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond(null,"success","Order Product Deleted!"));
    }
}
