@extends('layouts.app')

@section('title','Editar Categoria')

@section('body-class','profile-page sidebar-collapse')

@section('content')
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <h2 class="title text-center">Editar Categoria Seleccionado</h2>
        <form class="form" action="{{ url('/admin/categories/'.$categories->id.'/edit') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
               <div class="form-group bmd-form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                 <label for="exampleInput1" class="bmd-label-floating">Nombre</label>
                 <input type="text" id="exampleInput1" name="name" class="form-control" value="{{ $categories->name }}">
                 <span class="bmd-help">We'll never share your email with anyone else.</span>

                 @if ($errors->has('name'))
                     <span class="help-block">
                         <strong>{{ $errors->first('name') }}</strong>
                     </span>
                 @endif
               </div>
              </div>
              <div class="col-md-6 file">
                <label for="exampleInput3" class="bmd-label-floating pr-3">Imagen</label>
                <input type="file" id="exampleInput3" name="image">
                @if ($categories->image)
                  <p class="help-block">subir solo si desa remplazar la
                    <a href="{{ asset('/images/categories/'.$categories->image.'')}}" target="_blank"> imagen actual</a></p>
                @endif
              </div>
              <div class="col-md-12">
                 <div class="form-group bmd-form-group">
                   <label for="exampleInput3" class="bmd-label-floating">Descripcion</label>
                   <input type="text" id="exampleInput3" name="description" class="form-control" value="{{ $categories->description }}">
                   <span class="bmd-help">We'll never share your email with anyone else.</span>
                 </div>
                </div>
            </div>
          </div>
          <div class="footer text-center">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ url('/admin/categories') }}" class="btn btn-danger">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  @include('includes.footer')
@endsection
