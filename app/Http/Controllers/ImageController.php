<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
    public function index($id)
    {
      $product = Product::find($id);
      $images = $product->images()->orderBy('featured', 'desc')->get();
      return view('admin.products.images.index')->with(compact('product','images'));
    }
    public function store(Request $request, $id)
    {
      // guardar la imagen en nuestro proyecto
      $file = $request->file('photo');
      $path = public_path() .  '/images/products';
      $fileName = uniqid() . $file->getClientOriginalName();
      $moved = $file->move($path, $fileName);

      // crear 1 registro en la tabla product_images
      if ($moved) {
        $productImages = new ProductImage();
        $productImages->image = $fileName;
        //$productImages->featured = false;
        $productImages->product_id = $id;
        $productImages->save();
      }

      return back();
    }
    public function destroy(Request $request, $id)
    {
      // Eliminar el archivo
      $productImages = ProductImage::find($request->image_id);
      if (substr($productImages->image, 0, 4) === "http") {
        $delete = true;
      }else {
        $fullPath = public_path(). '/images/products/'. $productImages->image;
        $delete = File::delete($fullPath);
      }
      // eliminar el registro de la img en la bd
      if ($delete) {
        $productImages->delete();
      }
      return back();
    }
    public function select($id, $image)
    {
      ProductImage::where('product_id',$id)->update([
        'featured' => false
      ]);

      $productImages = ProductImage::find($image);
      $productImages->featured = true;
      $productImages->save();

      return back();
    }
}
