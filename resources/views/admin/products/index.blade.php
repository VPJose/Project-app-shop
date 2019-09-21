@extends('layouts.app')

@section('title','Listado de Productos')

@section('body-class','profile-page sidebar-collapse')

@section('content')
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Productos Disponibles</h2>
        <div class="team">
          <div class="row">
            <div class="col-sm-8 col-md-5 ml-auto mr-auto my-3">
              <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round text-withe">Nuevo Producto</a>
            </div>
            <table class="table">
              <thead>
                <tr class="row">
                  <th class="text-cente col-1">#</th>
                  <th class="col-2">Nombre</th>
                  <th class="col-3">Description</th>
                  <th class="col-2">Categoria</th>
                  <th class="col-2">Precio</th>
                  <th class="col-2">Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr class="row">
                    <td class="text-cente col-1">{{ $product->id }}</td>
                    <td class="col-2">{{ $product->name }}</td>
                    <td class="col-3">{{ $product->description }}</td>
                    <td class="col-2">{{ $product->category ? $product->category->name : 'General' }}</td>
                    <td class="col-2">&euro;{{ $product->price }}</td>
                    <td class="td-actions col-2">
                      <form action="{{ url('/admin/products/'.$product->id.'/delete') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a rel="tooltip" title="Ver" class="btn btn-info btn-fab btn-round btn-link" name="button">
                          <i class="fa fa-info"></i>
                        </a>
                        <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar" class="btn btn-success btn-fab btn-round btn-link" name="button">
                          <i class="fa fa-edit"></i>
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
            <div class="footer ml-auto mr-auto">
              {{ $products->links("pagination::bootstrap-4") }}
            </div>
          </div>
        </div>
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