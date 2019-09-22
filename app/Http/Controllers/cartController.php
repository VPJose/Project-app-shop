<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cartController extends Controller
{
    public function update()
    {
      $cart = auth()->user()->cart;
      $cart->status = 'Pending';
      $cart->save(); //UPDATE

      $notification = 'Tu pedido se a registrado correctamente, te contactaremos via mail';
      return back()->with(compact('notification'));
    }
}
