<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;


class ItemsController extends BaseController
{
    //Displays A List Of All Products

    public function index() {
        $items = Item::all();
        return $this->sendResponse($items, "Success");
    }


}
