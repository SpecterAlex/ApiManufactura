<?php

namespace App\Http\Controllers;

use App\Models\ProductionShift;
use Illuminate\Http\Request;

class ProductionShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ProductionShift::paginate(15));
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
            $productionShift = ProductionShift::create($request->all());
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond($productionShift));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->respond(ProductionShift::find($id)));
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
            ProductionShift::find($id)->update($request->all());
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond(ProductionShift::find($id)));
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
            $result = ProductionShift::find($id)->delete();
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond(null,"success","Production Shift Deleted!"));
    }
}
