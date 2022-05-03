@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8" >
                <div class="card text-center">
                    <div class="card-header">{{ __('Datos de Perfil') }}</div>
                </div>
                <br>
                <div class="row">
                        <div class="col-xs-12 col-sm-6 text-center" style="width: 18rem;">
                            
                               @if( empty ($user->image))
                                    <img width="59" height="35" style="max-width:100%;width:auto;height:auto;" src="{{ asset('images/default-avatar.png') }}" alt="Image Not Available" class="card-img-top" >
                                @else
                                    <img src="{{route('user.image',['filename' => $user->image ])}}" class="card-img-top" width="59" height="35"  alt="Avater Usuario" style="max-width:100%;width:auto;height:auto;" >
                                @endif

                        </div>
                        <div class="col-xs-12 col-sm-4 text-center ">
                            <h3 style="color:black; ">Hola! soy, <br> {{$user->name}}  {{$user->apellido}} </h3>
                            <p class="card-text" style="color:black;">{{$user->email}}</p>
                            <p class="card-text" style="color:black;">{{ $user->descripcion}}</p>
                        </div>
                        <br>
                </div>
                <br>
                <div class="card-footer center">
                    <small class="text-muted">Ultima Acualización: {{$user->updated_at}}</small>
                </div>
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
                <div>
                    

                        @if(Auth::user()->id == $user->id)
                            <div class="card">
                                <div class="card text-center">
                                    <div class="card-header">Nuevo Post</div>
                                    <div class="card-body">
                                    <form method="POST" action="{{action('ImagenController@store')}}" enctype="multipart/form-data">
                                        @csrf
                                            <input name="id_user" id="id_user" type="hidden" value="{{Auth::user()->id}}">
                                            <div class="form-group row">
                                                
                                                <div class="col btn btn-info" id="btn_editar">
                                                    <input id="image" name="image_path" type="file" class="form-control @error('image_path') is-invalid @enderror">
                                                        <span class="fa fa-upload" id="upload-image"><small>   Cargar Imagen</small></span>
                                                    {{-- @error('image_path')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror --}}

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="col-md-3 col-form-label text-md-right">Mi comentario</label>
                                                <div class="col">
                                                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" ></textarea>
                                                     @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-primary far fa-plus-square fa-2x">
                                                        Postear!
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <br>

                        <div>
                            <div class="card text-center">
                                <div class="card-header">{{ __('Mis Posts') }}</div>
                            <br>
                            </div>
                                @foreach ($user->imagen as $image)
                                    @include('includes.imagen',['imagenes'=> $image])
                                @endforeach
                        </div>
                            {{-- {{ $images->links() }} --}}
                </div>
        </div>
    </div>
</div>        

@endsection
