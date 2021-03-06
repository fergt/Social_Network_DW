@extends('layouts.app')

@section('content')

<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">Socia Network</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="{{route('user.image',['filename' => Auth::user()->image])}}" alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">{{ Auth::user()->name }}
            <strong>Guzman</strong>
          </span>
          <span class="user-role">NICK</span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-search">
        <div>
          <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
              <span class="badge badge-pill badge-warning">-</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Dashboard 1
                    <span class="badge badge-pill badge-success">-</span>
                  </a>
                </li>
                <li>
                  <a href="#">Dashboard 2</a>
                </li>
                <li>
                  <a href="#">Dashboard 3</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-globe"></i>
              <span>Maps</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Google maps</a>
                </li>
                <li>
                  <a href="#">Open street map</a>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <a href="{{ action('UsuariosController@profile', ['id' => Auth::user()->id]) }}">
              <i class="fa fa-user"></i>
              <span>Mi Perfil</span>
            </a>

          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-calendar"></i>
              <span>Calendar</span>
            </a>
          </li>
          <li>
            <a href="myprofile">
              <i class="fa fa-users"></i>
              <span>Usuarios m??s Visitados</span>
            </a>
          </li>
          <li class="header-menu">
            <span>Publicaciones</span>
          </li>
          <li>
            <a href="{{route('Publicaciones.crear')}}">
              <i class="fa fa-calendar"></i>
              <span>Nueva</span>
            </a> 
          </li>
          <li>
            <a href="{{ route('Publicaciones.publicaci') }}">
              <i class="fa fa-calendar"></i>
              <span>Ver todas</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
      <div class="sidebar-footer">
        <a href="#">
          <i class="fa fa-bell"></i>
          <span class="badge badge-pill badge-warning notification">3</span>
        </a>
        <a href="#">
          <i class="fa fa-envelope"></i>
          <span class="badge badge-pill badge-success notification">7</span>
        </a>
        <a href="{{ route('usuario.editarusuario') }}">
          <i class="fa fa-cog"></i>
          <span class="badge-sonar"></span>
        </a>
        <a href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
          <i class="fa fa-power-off"></i>
        </a>
      </div>
  </nav>
  <!-- sidebar-wrapper  -->

<main class="page-content">
     
      <div class="container">
        <div class="card-header text-center"><h2 style="color:black;">{{ __('Usuarios mas visitados') }}</h2></div>
          <div class="row justify-content-center">
              <br>
              <br>
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-md-8">
                        <br>

                          @if (session('message'))
                              <div class="alert alert-success">
                                  {{ session('message') }}
                              </div>
                              <br>
                          @endif

                          @foreach ($images as $image)
                              @include('includes.imagen')
                          @endforeach

                          <br>
                          <br>
                          {{ $images->links() }}
                      </div>
                  </div>
              </div>
          </div>
      </div>

</main>

@endsection



