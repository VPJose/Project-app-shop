@extends('layouts.app')

@section('title','Registro de Productos')

@section('body-class','profile-page sidebar-collapse')

@section('content')
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <h2 class="title text-center">Editar Producto Seleccionado</h2>
        <form class="form" action="{{ url('/admin/products/'.$product->id.'/edit') }}" method="post">
          {{ csrf_field() }}
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
               <div class="form-group bmd-form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                 <label for="exampleInput1" class="bmd-label-floating">Nombre</label>
                 <input type="text" id="exampleInput1" name="name" class="form-control" value="{{ $product->name }}">
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
                   <input type="number" step="0.01" id="exampleInput2" name="price" class="form-control" value="{{ $product->price }}">
                   <span class="bmd-help">We'll never share your email with anyone else.</span>
                 </div>
                </div>
              <div class="col-md-12">
                 <div class="form-group bmd-form-group">
                   <label for="exampleInput3" class="bmd-label-floating">Description Corta</label>
                   <input type="text" id="exampleInput3" name="description" class="form-control" value="{{ $product->description }}">
                   <span class="bmd-help">We'll never share your email with anyone else.</span>
                 </div>
                </div>
              <div class="col-12 my-3">
                <div class="input-group">
                  <textarea name="long_description" class="form-control" placeholder="Description Detallada del producto" rows="2">{{ $product->long_description }}</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="footer text-center">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ url('/admin/products') }}" class="btn btn-danger">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="https://creative-tim.com/presentation">
              About Us
            </a>
          </li>
          <li>
            <a href="http://blog.creative-tim.com">
              Blog
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/license">
              Licenses
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
      </div>
    </div>
  </footer>
@endsection
