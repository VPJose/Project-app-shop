<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class cartDetailController extends Controller
{
    public function store(Request $request)
    {
      if (auth()->user()) {
        $cartDetail = new CartDetail();
        $cartDetail->cart_id = auth()->user()->cart->id;
        $cartDetail->product_id = $request->product_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->save();
        $notification = 'Se agrego correctamente';
        $alert = 'success';
      }else {
        $notification = 'Primero debes Ingresar';
        $alert = 'danger';
      }

      return back()->with(compact('notification'));
    }
    public function destroy(Request $request)
    {
      $cartDetail = CartDetail::find($request->cart_detail_id);
      // Verifica que este eliminando solo el de la persona que esta autenticado
      if ($cartDetail->cart_id == auth()->user()->cart->id) {
        $cartDetail->delete();
      }
      $notification = 'El Producto se a eliminado correctamente';

      return back()->with(compact('notification'));
    }
}
