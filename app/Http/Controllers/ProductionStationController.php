<?php

namespace App\Http\Controllers;

use App\Models\ProductionStation;
use Illuminate\Http\Request;

class ProductionStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ProductionStation::paginate(15));
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
            $productionStation = ProductionStation::create($request->all());
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond($productionStation));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        ProductionStation::find($id)->load(['productionline']);
        return response()->json($this->respond(ProductionStation::find($id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            ProductionStation::find($id)->update($request->all());
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond(ProductionStation::find($id)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $result = ProductionStation::find($id)->delete();
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond(null,"success","Production Station Deleted!"));
    }
}
