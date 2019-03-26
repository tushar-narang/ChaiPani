<?php

namespace App\Http\Controllers\API;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;


class CategoriesController extends BaseController
{
    //
    public function index() {
        $categories = Category::all();
        return $this->sendResponse($categories, "Success");
    }

    //Get a list of items for the given category

    public function getItems($id) {
        $category = Category::find($id);
        if($category == null) {
            return $this->sendError("Invalid Category ID", "Error");
        }
        return $this->sendResponse($category->items(), "Success");
    }
}
