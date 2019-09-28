<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function show($id)
    {
      $category = Category::find($id);
      $products = $category->products()->paginate(9);
      return view('categories.show')->with(compact('category','products'));
    }
}
