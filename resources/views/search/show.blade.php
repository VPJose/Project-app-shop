@extends('layouts.app')

@section('title', 'Resultado de la Busqueda')

@section('body-class','profile-page sidebar-collapse')

@section('styles')
<style>
  .team .row .col-md-4 {
    margin-bottom: 5em;
  }
  .row {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
  }
  .row > [class*='col-'] {
    display: flex;
    flex-direction: column;
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
                <img src="{{ asset('/img/search.png') }}" style="border-radius: 80px;">
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
                <h3 class="title">Resultado de Busqueda</h3>
              </div>
              <div class="description text-center">
                <p>Se encontraron {{ $products->count() }} resultado para el termino {{ $query }}</p>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="row my-5 ml-auto mr-auto">
              <div class="team text-center">
                <div class="row">
                  @foreach ($products as $product)
                    <div class="col-md-4">
                      <div class="team-player">
                        <div class="card card-plain">
                          <div class="col-md-6 ml-auto mr-auto">
                            <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid" width="250" height="250">
                          </div>
                          <h4 class="card-title">
                            <a href="{{ url('/products/'.$product->id.'') }}">{{ $product->name }}</a>
                          </h4>
                          <div class="card-body">
                            <p class="card-description">{{ $product->description }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="row ml-auto mr-auto mb-5">
            {{ $products->links("pagination::bootstrap-4") }}
          </div>
        </div>
      </div>
    </div>
  </div>
    @include('includes.footer')
@endsection
