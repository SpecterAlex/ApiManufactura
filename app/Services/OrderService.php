<?php

namespace App\Services;
use DB;

class OrderService {

       /**
     * Create a production consolidation from orders.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function consolidation()
    {
        return DB::table('customers')->get();
    }
}