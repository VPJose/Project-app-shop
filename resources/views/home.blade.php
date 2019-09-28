@extends('layouts.app')

@section('title','App Shop | Dashboard')

@section('body-class','profile-page sidebar-collapse')

@section('content')
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <h2 class="title text-center">Dashboard</h2>
        @if (session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
            </div>
        @endif
        <ul class="nav nav-pills nav-pills-icons" role="tablist">
          <!-- color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"-->
          <li class="nav-item">
            <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
              <i class="material-icons">dashboard</i>
              Carrito de Compras
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
              <i class="material-icons">list</i>
              Pedidos Realizados
            </a>
          </li>
        </ul>
        <hr>
        <p>Tu Carrito de Compras Presenta {{auth()->user()->cart->details->count() }} Producto .</p>
        <table class="table">
          <thead>
            <tr class="row">
              <th class="text-cente col-2">#</th>
              <th class="col-2">Nombre</th>
              <th class="col-3">Description</th>
              <th class="col-1">Precio</th>
              <th class="col-1">Cantidad</th>
              <th class="col-1">Sub Total</th>
              <th class="col-2">Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach (auth()->user()->cart->details as $detail)
              <tr class="row">
                <td class="text-cente col-2">
                  @if ($detail->product->images->featured === 1)
                    <img src="{{ $detail->product->featured_image_url }}" alt="Image" width="75" height="75">
                  @else
                    <img src="{{ $detail->product->featured_image_url }}" alt="Image" width="75" height="75">
                  @endif
                </td>
                <td class="col-2">
                  <a href="{{ url('/products/'.$detail->product->id.'') }}" target="_blank">{{ $detail->product->name }}</a>
                </td>
                <td class="col-3">{{ $detail->product->category ? $detail->product->category->name : 'General' }}</td>
                <td class="col-1">$ {{ $detail->product->price }}</td>
                <td class="col-1 text-center">{{ $detail->quantity }}</td>
                <td class="col-1 text-center">$ {{ $detail->quantity * $detail->product->price }}</td>
                <td class="td-actions col-2">
                  <form action="{{ url('/cart') }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                    <a href="{{ url('/products/'.$detail->product->id.'') }}" rel="tooltip" target="_blank" title="Ver" class="btn btn-info btn-fab btn-round btn-link" name="button">
                      <i class="fa fa-info"></i>
                    </a>
                    <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-fab btn-round btn-link" name="button">
                      <i class="fa fa-times"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="text-center">
          <form class="form" action="{{ url('/order') }}" method="post">
            {{ csrf_field() }}
            <button class="btn btn-primary btn-round" type="submit" name="button">
              <i class="material-icons">done</i> Realizar Pedido
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @include('includes.footer')
@endsection
