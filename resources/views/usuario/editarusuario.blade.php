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
              <span>Usuarios más Visitados</span>
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
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @else


        @endif
      <div class="card-header"> {{ __('Edición de Datos de Perfil') }}</div>
      <br>


      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

          @endforeach
        </ul>
      </div>



      @endif

      <hr style="color:black;">
    <table class="container">
        <td>
        <div class="mt-5 ml-5">
            <div id="content" class="col-lg-12">
                <form method="POST" action="{{action('EditarUsuarioController@update')}}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" value="{{Auth::user()->id}}">
                    <div class="card" style="width: 20rem"; width="200" height="350">
                        <!-- <img class="card-img-top" width="200" height="350" style="max-width:100%;width:auto;height:auto;"  src="images/default-avatar.png"> -->

                          @include('includes.usrimagen')

                        <div class="card-body">
                            <div class="form-group col">
                                <p class="card-text" style="color: black">Hola, soy {{ Auth::user()->name }}</p>
                                <table class="container">
                                    <td>
                                        <div class="col btn btn-info" id="btn_editar">
                                            <input id="image" type="file" class="form-control @error('image_path') is-invalid @enderror" name="image_path"  >        
                                            <span class="fa fa-upload" id="upload-image"><small> Editar Avatar</small></span>
                                        </div>
                                    </td>
                                    <td>
                                    <!--    <div class="col btn btn-info">
                                            <input id="cargarimg" type="submit" class="btn btn-info upload" value="Aceptar" name="cargarimg" onclick="location.reload()"> 
                                            <span class="fa fa-upload" id="upload-image"><small> Cargar</small></span>
                                        </div> -->
                                    </td>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>
        </td>
        <td>
           

                <div class="form-group row">
                    <label for="inputNombre1" class="col-sm-2 col-form-label ml-5">Nombre:</label>
                    <div>
                        <input id="name" type="text" class="form-control ml-5" placeholder="Nombre" name="name"  value="{{ Auth::user()->name }}" >
                    </div>
                   <!-- <button type="submit" class="btn btn-info fa fa-pen ml-2"></button> -->
                </div>
                <div class="form-group row">
                    <label for="apellido" class="col-sm-2 col-form-label ml-5">Apellido:</label>
                    <div>
                        <input id="apellido" type="text" class="form-control ml-5" placeholder="Apellido" name="apellido"  value="{{ Auth::user()->apellido }}" >
                    </div>
                   <!-- <button type="submit" class="btn btn-info fa fa-pen ml-2"></button> -->
                </div>
                <div class="form-group row">
                    <label for="fecha_nac" class="col-sm-2 col-form-label ml-5">Fecha Nacimiento:</label>
                    <div>
                        <input id="fecha_nac" type="text" class="form-control ml-5" placeholder="Fecha Nacimiento" name="fecha_nac" readonly="readonly" value="{{ Auth::user()->fecha_nac }}">
                    </div>
                   <!-- <button type="submit" class="btn btn-info fa fa-pen ml-2"></button> -->
                </div>
                <div class="form-group row">
                    <label for="inputEmail1" class="col-sm-2 col-form-label ml-5">Email:</label>
                    <div>
                        <input id="email" type="text" class="form-control ml-5" placeholder="Email" name="email" readonly="readonly" required value="{{ Auth::user()->email }}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="descripcion" class="col-sm-2 col-form-label ml-5">Describete:</label>
                    <div>
                        <input id="descripcion" type="text" class="form-control ml-5" placeholder="Acerca de ti" name="descripcion"  value="{{ Auth::user()->descripcion }}" >
                    </div>
                </div>

                <div>
                    <div class="col btn  col text-md-center">
                      <button type="submit" class="btn btn-info fa fa-save"><small>  Guardar Datos</small></button>
                    </div>
                </div>
            </form>
        </td>
    </table>
    <hr>


    </div>

  </main>
  <!-- page-content" -->
</div>
<!-- page-wrapper -->




@endsection