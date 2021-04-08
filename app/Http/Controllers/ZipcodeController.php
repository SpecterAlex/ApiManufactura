<?php

namespace App\Http\Controllers;

use App\Models\Catalogs\Zipcode;
use Illuminate\Http\Request;

class ZipcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Zipcode::all());
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
            $zipcode = Zipcode::create($request->all());
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond($zipcode));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalogs\Zipcode  $zipcode
     * @return \Illuminate\Http\Response
     */
    public function show($zipcode)
    {
        $model = Zipcode::where('zipcode',$zipcode)->firstOrFail();
        $model->load(['suburbs']);
        $model->load(['city.state']);
        return response()->json($this->respond($model));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalogs\Zipcode  $zipcode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zipcode $zipcode)
    {
        try{
            $zipcode->update($request->all());
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond($zipcode));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalogs\Zipcode  $zipcode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zipcode $zipcode)
    {
        try
        {
            $result = $zipcode->delete();
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond(null,"success","Zipcode Deleted!"));
    }
}
