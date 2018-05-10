<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\ProductCollection;
use Illuminate\Http\Request;

use App\Model\Product;
use App\Model\Category;

class CategoryProductController extends Controller
{
    public function index(Category $category)
    {
        return ProductCollection::collection($category->product);
    }
}
