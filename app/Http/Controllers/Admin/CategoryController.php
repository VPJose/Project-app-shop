<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use File;

class CategoryController extends Controller
{
  public function index()
  {
    $categories = Category::orderBy('name')->paginate(10);
    return view('admin.categories.index')->with(compact('categories'));
  }
  public function create()
  {
    return view('admin.categories.create');
  }
  public function store(Request $request)
  {
    // registrar la bueva categoria en la base de datos
    $category = Category::create($request->only('name','description')); // Asignacion masiva
    if ($request->hasFile('image')) {
      // guardar la imagen en nuestro proyecto
      $file = $request->file('image');
      $path = public_path() .  '/images/categories';
      $fileName = uniqid() .'-'.$file->getClientOriginalName();
      $moved = $file->move($path, $fileName);

      // Actualizar Categoria
      if ($moved) {
        $category->image = $fileName;
        $category->save(); //Update
      }
    }
    return redirect('/admin/categories');
  }
  // Forma mas rapida de pasar el id
  public function edit(Category $categories)
  {
    return view('admin.categories.edit')->with(compact('categories'));
  }
  public function update(Request $request, $id)
  {
    $category = Category::find($id);
    if ($request->hasFile('image')) {
      // guardar la imagen en nuestro proyecto
      $file = $request->file('image');
      $path = public_path() .  '/images/categories';
      $fileName = uniqid() .'-'.$file->getClientOriginalName();
      $moved = $file->move($path, $fileName);

      // Actualizar Categoria
      if ($moved) {
        $previousPath = $path.'/'.$category->image;
        $category->name =  $request->input('name');
        $category->image = $fileName;
        $category->description =  $request->input('description');
        $save = $category->save(); //Update

        if ($save) {
          File::delete($previousPath);
        }
      }
    }
    return redirect('/admin/categories');
  }
  public function destroy(Category $categories)
  {
    $categories->delete(); // Update

    return back();
  }
}
