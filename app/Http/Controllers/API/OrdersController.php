<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends BaseController
{
    //
    public function create(Request $request) {
        return dd($request->json()->all());
    }
}
