@extends('layouts.app')

@section('title','Ingresa')

@section('body-class','login-page sidebar-collapse')

@section('content')
  <div class="page-header header-filter" style="background-image: url('{{ asset('img/bg7.jpg') }}'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Inicion de Seción</h4>
                <div class="social-line">
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-facebook-square"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-twitter"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </div>
              </div>
              <p class="description text-center">Ingrese sus Datos</p>
              <div class="card-body">
                <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="email" class="form-control" placeholder="Email..." name="email" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input id="password" type="password" class="form-control" placeholder="Password..." name="password" required>
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
                <div class="row">
                  <div class="ml-auto mr-auto text-center">
                    <button type="submit"  class="btn btn-primary btn-raised">
                      INICIAR SECIÓN
                    </button>
                  </div>
                </div>
                <!--<div class="footer text-center">
                  <a class="btn btn-primary btn-link btn-wd btn-lg" href="{{ route('password.request') }}">
                            ¿OLVIDASTE TU CONTRASEÑA?
                  </a>
                </div>-->
              </div>

              <!--<div class="footer text-center">
                <a href="#pablo" class="btn btn-primary btn-link btn-wd btn-lg">Get Started</a>
              </div>-->
            </form>
          </div>
        </div>
      </div>
    </div>
      @include('includes.footer')
    </div>
@endsection
