@extends('layouts.app')

@section('title')
{{ $product->name }}
@endsection

@section('body-class','profile-page sidebar-collapse')

@section('styles')
<style>
  .rounded {
    height: 100px;
    width: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    border-radius: 50%;
    background-size: cover;
  }
</style>
@endsection

@section('content')
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/city-profile.jpg') }}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="{{ $product->featured_image_url }}" class="rounded img-rounded">
              </div>
              @if (session('notification'))
                @if (session('alert'))
                  <div class="alert alert-success" role="alert">
                    {{ session('notification') }}
                  </div>
                @else
                  <div class="alert alert-danger" role="alert">
                    {{ session('notification') }}
                  </div>
                @endif
              @endif
              <div class="name">
                <h3 class="title">{{ $product->name }}</h3>
                <h6>{{ $product->category->name }}</h6>
              </div>
              <div class="description text-center">
                <p>{{ $product->long_description }}</p>
              </div>
            </div>
            <div class="text-center">
              <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#myModal">
                <i class="material-icons">add</i> Añadir al Carrito de Compras
              </button>
            </div>
          </div>
          <div class="row my-5 ml-auto mr-auto">
            @foreach ($images as $image)
              <div class="col-md-4 my-4">
                <img src="{{ $image->url }}" alt="" class="img-rounded" width="250" height="350">
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Core -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">ASeleccione la Cantidad que desea Agregar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <form class="form" action="{{ url('/cart') }}" method="post">
          {{ csrf_field() }}
          <div class="modal-body">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="number" name="quantity" value="1" class="form-control">
          </div>
          <div class="modal-footer pt-2">
            <button type="button" class="btn btn-danger btn-link mx-2" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info btn-link mx-2">Añadir al Carrito</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @include('includes.footer')
@endsection
