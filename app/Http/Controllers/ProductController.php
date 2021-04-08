<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Product::paginate(15));
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
            $url = "";

            if(!is_null($request->file('url_image'))){
                $request->validate([
                    'url_image' => 'image|max:2048'
                ]);

                $images = $request->file('url_image')->store('public/images/products');
                $url = Storage::url($images);
            }

            $product = Product::create([
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "volume" => $request->volume,
                "url_image" => $url
            ]);

        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond($product));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json($this->respond($product));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try{       
            $url = $product->url_image;

            if(!is_null($request->file('url_image'))){

                $request->validate([
                    'url_image' => 'image|max:2048'
                ]);

                $oldUrl = str_replace('storage','public',$product->url_image);
                Storage::delete($oldUrl);

                $images = $request->file('url_image')->store('public/images/products');
                $url = Storage::url($images);
            }

            $product->update([
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "volume" => $request->volume,
                "url_image" => $url
            ]);

        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond($product));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try
        {
            $oldUrl = str_replace('storage','public',$product->url_image);
            Storage::delete($oldUrl);
            
            $result = $product->delete();
        } catch (\Throwable $e){
            return response()->json($this->respond(null,"error",$e->getMessage()));
        }
        return response()->json($this->respond(null,"success","Product Deleted!"));
    }
}
