@extends('layouts.app')

@section('title','Bienvenido a App Shop')

@section('body-class','landing-page sidebar-collapse')

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
  .tt-query {
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

  .tt-hint {
    color: #999
  }

  .tt-menu {    /* used to be tt-dropdown-menu in older versions */
  width: 222px;
  margin-top: 4px;
  padding: 4px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
  -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
  box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

  .tt-suggestion {
    padding: 3px 20px;
    line-height: 24px;
  }

  .tt-suggestion.tt-cursor,.tt-suggestion:hover {
    color: #fff;
    background-color: #0097cf;
  }

  .tt-suggestion p {
    margin: 0;
  }
</style>
@endsection

@section('content')
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Bienvenido a App Shop.</h1>
          <h4>realiza tus pedidos en lina y te contactaremos a coordenar la entrega</h4>
          <br>
          <a href="#" target="_blank" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i> ¿Como Funciona?
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">¿Porque App Shop?</h2>
            <h5 class="description">Puedes revisar todos los productos disponibles que tenemos par la venta</h5>
          </div>
        </div>
        <div class="features">
          <div class="row">
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-info">
                  <i class="material-icons">chat</i>
                </div>
                <h4 class="info-title">Atendemos Dudas</h4>
                <p>Si tienes dudas con respecto a los productos o quieres saber mas, tan solo contactenos</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-success">
                  <i class="material-icons">verified_user</i>
                </div>
                <h4 class="info-title">Seguridad de Pagos</h4>
                <p>100% Seguro al momento del pagar</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-danger">
                  <i class="material-icons">fingerprint</i>
                </div>
                <h4 class="info-title">Privacidad</h4>
                <p>Completa privacidad para que uste quiero comprar sin preocupaciones</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section text-center">
        <h2 class="title">Visita Nuestras Categorias</h2>
        <form class="form-inline" action="{{ url('/search') }}" method="get">
          <div class="row mx-auto text-center">
            <div id="search " class="input-gorup p-2">
              <input class="typeahead form-control" type="text" name="query" placeholder="Busqueda">
            </div>
            <button type="submit" class="btn btn-primary btn-fab btn-fab-mini">
              <i class="material-icons">search</i>
            </button>
          </div>
        </form>
        <div class="team">
          <div class="row">
            @foreach ($categories as $category)
              <div class="col-md-4">
                <div class="team-player">
                  <div class="card card-plain">
                    <div class="col-md-6 ml-auto mr-auto">
                      <img src="{{ $category->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid" width="250" height="250">
                    </div>
                    <h4 class="card-title">
                      <a href="{{ url('/categories/'.$category->id.'') }}">{{ $category->name }}</a>
                    <div class="card-body">
                      <p class="card-description">{{ $category->description }}</p>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="section section-contacts">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">Contactenos</h2>
            <h4 class="text-center description">Si aun no te as registrado puedes consultar</h4>
            <form class="contact-form">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">nombre</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Correo</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleMessage" class="bmd-label-floating">mensaje</label>
                <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                  <button class="btn btn-primary btn-raised">
                    Enviar
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('includes.footer')
@endsection
