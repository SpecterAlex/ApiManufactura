<?php

namespace App\Http\Controllers;

use App\Models\ProductionLine;
use Illuminate\Http\Request;

class ProductionLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('paginate'))
        {
            if ($request->paginate == 'true')
                return response()->json(ProductionLine::paginate(15));
            else
                return response()->json($this->respond(ProductionLine::all()));
        }
        else
            return response()->json($this->respond(ProductionLine::all()));
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
            $productionLine = ProductionLine::create($request->all());
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond($productionLine));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->respond(ProductionLine::find($id)));
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
            ProductionLine::find($id)->update($request->all());
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond(ProductionLine::find($id)));
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
            $result = ProductionLine::find($id)->delete();
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond(null,"success","Production Line Deleted!"));
    }
}
