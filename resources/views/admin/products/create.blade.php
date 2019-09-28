@extends('layouts.app')

@section('title','Registro de Productos')

@section('body-class','profile-page sidebar-collapse')

@section('content')
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <h2 class="title text-center">Registro de Nuevo Producto</h2>
        @if (@$errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($error->all() as $error)
                <li>{{ $error}}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form class="form" action="{{ url('/admin/products') }}" method="post">
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
              <div class="col-md-6">
                 <div class="form-group bmd-form-group">
                   <label for="exampleInput2" class="bmd-label-floating">Precio</label>
                   <input type="number" step="0.01" id="exampleInput2" name="price" class="form-control">
                   <span class="bmd-help">We'll never share your email with anyone else.</span>
                 </div>
                </div>
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <label for="exampleInput3" class="bmd-label-floating">Description Corta</label>
                  <input type="text" id="exampleInput3" name="description" class="form-control">
                  <span class="bmd-help">We'll never share your email with anyone else.</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group label-floating">
                   <label class="control-label">Categoria</label>
                   <select class="form-control" name="category_id">
                     <option value="0">General</option>
                     @foreach ($categories as $category)
                       <option value="{{ $category->id }}">{{ $category->name }}</option>
                     @endforeach
                   </select>
                </div>
              </div>
              <div class="col-12 my-3">
                <div class="input-group">
                  <textarea name="long_description" class="form-control" placeholder="Description Detallada del producto" rows="2"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="footer text-center">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ url('/admin/products') }}" class="btn btn-danger mx-2">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  @include('includes.footer')
@endsection
