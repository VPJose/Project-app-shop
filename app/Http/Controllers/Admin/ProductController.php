<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index()
    {
      $products = Product::paginate(10);
      return view('admin.products.index')->with(compact('products'));
    }
    public function create()
    {
      $categories = Category::orderBy('name')->get();
      return view('admin.products.create')->with(compact('categories'));
    }
    public function store(Request $request)
    {
      // registrar el nuevo producto en la base de datos
      //dd($request->all());
      $product = new Product();
      $product->name = $request->input('name');
      $product->description = $request->input('description');
      $product->price = $request->input('price');
      $product->long_description = $request->input('long_description');
      $product->category_id = $request->input('category_id');
      $product->save(); // Insert

      return redirect('/admin/products');
    }
    public function edit($id)
    {
      $product = Product::find($id);
      $categories = Category::orderBy('name')->get();
      return view('admin.products.edit')->with(compact('product','categories'));
    }
    public function update(Request $request, $id)
    {
      // Actualizar el producto en la base de datos
      //dd($request->all());
      $product = Product::find($id);
      $product->name = $request->input('name');
      $product->description = $request->input('description');
      $product->price = $request->input('price');
      $product->long_description = $request->input('long_description');
      $product->category_id = $request->input('category_id');
      $product->save(); // Update

      return redirect('/admin/products');
    }
    public function destroy($id)
    {
      $product = Product::find($id);
      $product->delete(); // Update

      return back();
    }
}
