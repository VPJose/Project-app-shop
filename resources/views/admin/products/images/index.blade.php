@extends('layouts.app')

@section('title','Imagenes de Productos')

@section('body-class','profile-page sidebar-collapse')

@section('content')
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Imagenes del Producto "{{ $product->name }}"</h2>
        <form action="" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="card col-md-6 m-auto">
            <div class="card-body">
              <div class="card-header card-header-primary py-2">
                <h4 class="card-title">Subir Imagen</h4>
              </div>
              <div class="fileinput fileinput-new text-center py-3" data-provides="fileinput">
                <span class="btn btn-raised btn-round btn-default btn-file">
                <span class="fileinput-exists">Seleccionar</span>
                <input type="file" name="photo"required />
                </span>
              </div>
            </div>
              <button type="submit" class="btn btn-primary text-withe">Subir Nueva Imagen</button>
              <a href="{{ url('/admin/products') }}" class="btn btn-default text-withe">Volver al Listado de Productoss</a>
            </div>
          </div>
        </form>
        <div class="row">
          @foreach ($images as $image)
            <div class="col-md-4">
              <div class="card mb-3">
                <img class="card-img-top" src="{{ $image->url }}" width="250" height="350px" alt="Card image cap">
                <div class="card-body text-center">
                <form class="form" action="" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <input type="hidden" name="image_id" value="{{ $image->id }}">
                  <button type="submit" class="btn btn-danger btn-round text-withe">Eliminar Imagen</button>
                  @if ($image->featured)
                    <button type="button" class="btn btn-success btn-fab btn-fab-mini btn-round text-witre disabled" rel="tooltip" title="Imagen destacada de este producto">
                      <i class="material-icons">favorite</i>
                    </button>
                  @else
                    <a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id.'') }}"class="btn btn-primary btn-fab btn-fab-mini btn-round text-witre">
                      <i class="material-icons">favorite</i>
                    </a>
                  @endif
                </form>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @include('includes.footer')
@endsection
