@extends('layouts.app')

@section('title','Listado de Categorias')

@section('body-class','profile-page sidebar-collapse')

@section('content')
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Categorias Disponibles</h2>
        <div class="team">
          <div class="row">
            <div class="col-sm-8 col-md-5 ml-auto mr-auto my-3">
              <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round text-withe">Nuevo Categoria</a>
            </div>
            <table class="table">
              <thead>
                <tr class="row">
                  <th class="text-cente col-1">#</th>
                  <th class="col-2 text-center">Nombre</th>
                  <th class="col-4 text-center">Description</th>
                  <th class="col-2">Imagen</th>
                  <th class="col-3 text-center">Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $key => $category)
                  <tr class="row">
                    <td class="text-center col-1 ">{{ $key + 1 }}</td>
                    <td class="col-2 text-center">{{ $category->name }}</td>
                    <td class="col-4 text-center">{{ $category->description }}</td>
                    <td class="col-2">
                      <img src="{{ $category->featured_image_url }}" alt="" height="50" width="50">
                    </td>
                    <td class="td-actions col-3 text-center">
                      <form action="{{ url('/admin/categories/'.$category->id.'') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="{{ url('/categories/'.$category->id.'') }}" rel="tooltip" title="Ver" class="btn btn-info btn-fab btn-round btn-link" name="button">
                          <i class="fa fa-info"></i>
                        </a>
                        <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar" class="btn btn-success btn-fab btn-round btn-link" name="button">
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
              {{ $categories->links("pagination::bootstrap-4") }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('includes.footer')
@endsection
