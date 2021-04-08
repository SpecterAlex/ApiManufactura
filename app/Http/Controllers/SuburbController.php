<?php

namespace App\Http\Controllers;

use App\Models\Catalogs\Suburb;
use Illuminate\Http\Request;

class SuburbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Suburb::all());
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
            $suburb = Suburb::create($request->all());
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond($suburb));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalogs\Suburb  $suburb
     * @return \Illuminate\Http\Response
     */
    public function show(Suburb $suburb)
    {
        $suburb->load(['zipcode.city.state']);
        return response()->json($this->respond($suburb));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalogs\Suburb  $suburb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suburb $suburb)
    {
        try{
            $suburb->update($request->all());
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond($suburb));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalogs\Suburb  $suburb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suburb $suburb)
    {
        try
        {
            $result = $suburb->delete();
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond(null,"success","Suburb Deleted!"));
    }
}
