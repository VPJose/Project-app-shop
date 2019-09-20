<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
      return view('admin.products.index'); // Listado
    }
    public function create()
    {
      return view('admin.products.create'); // Formulario de Registro
    }
    public function store()
    {
      // registrar el producto en el BD
    }
}
