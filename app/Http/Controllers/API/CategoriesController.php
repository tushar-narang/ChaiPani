<?php

namespace App\Http\Controllers\API;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;


class CategoriesController extends BaseController
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $categories = Category::all();
        return $this->sendResponse($categories, "Success");
    }

    /**
     * Get All items For That Particular Category.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function getItems($id) {
        $category = Category::find($id);
        if($category == null) {
            return $this->sendError("Invalid Category ID", "Error");
        }
        return $this->sendResponse($category->items, "Success");
    }
}
