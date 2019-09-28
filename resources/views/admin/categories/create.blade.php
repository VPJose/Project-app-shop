@extends('layouts.app')

@section('title','Registro de Categoria')

@section('body-class','profile-page sidebar-collapse')

@section('styles')
  <style media="screen">
    .file {
      display: grid;
    }
  </style>
@endsection

@section('content')
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <h2 class="title text-center">Registro de Nueva Categoria</h2>
        @if (@$errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($error->all() as $error)
                <li>{{ $error}}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form class="form" action="{{ url('/admin/categories') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
               <div class="form-group bmd-form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                 <label for="exampleInput1" class="bmd-label-floating">Nombre</label>
                 <input type="text" id="exampleInput1" name="name" class="form-control">
                 <span class="bmd-help">We'll never share your email with anyone else.</span>

                 @if ($errors->has('name'))
                     <span class="help-block">
                         <strong>{{ $errors->first('name') }}</strong>
                     </span>
                 @endif
               </div>
              </div>
              <div class="col-md-6 file">
                <label for="exampleInput3" class="bmd-label-floating pr-3">Imagen de la Categoria</label>
                <input type="file" id="exampleInput3" name="image">
              </div>
              <div class="col-md-12">
                <div class="input-group">
                  <textarea name="description" class="form-control" placeholder="Description de la Categoria" rows="2"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="footer text-center">
            <button type="submit" class="btn btn-primary  mx-2">Guardar</button>
            <a href="{{ url('/admin/categories') }}" class="btn btn-danger mx-2">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  @include('includes.footer')
@endsection
