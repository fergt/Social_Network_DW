@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
             @endif            

                <div class="card">

                    {{-- Detalles de la imagen --}}
                    <div class="main_image">
                        <div class="card-body">
                            <img src="{{route('image.get',['filename' => $image->image_path])}}" alt="" class="col-md-12">
                            <br>
                            <br>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-11" align="right">
                                        <span style="color:#A0ADC2;">Fecha Publicación de Post. <br> {{$image->created_at}}</span>
                                        <br>
                                        <span style="color:#A0ADC2;">publicado por. <br>{{$image->user->name.' '.$image->user->apellido}}</span>
                                        <br>
                                    </div>
                                </div>
                                
                                    <p style="color:#949393; font-size: 14px;">Información de Post. <br> {{$image->description}}</p>

                                        {{-- Botones para editar o borrar la imagen depende de si el usuario es el dueño de la imagen --}}
                                   
                                    
                                    @if(Auth::user()->id == $image->user->id)
                                    
                                    <div align="col-md-12">
                                        <div class="row"> 
                                            <div class="col-md-11" align="right">
                                                {{-- Boton par editar la imagen --}}
                                            <a href="#" class="btn btn-sm btn-info float-right far fa-edit fa-2x"> </a> 
                                        
                                            {{-- para preguntar si realmente queremos borrar la imagen --}}
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-danger far fa-trash-alt fa-2x"  data-toggle="modal" data-target="#exampleModal"> </button>
                                            </div>
                                                

                                        </div>
                                    </div>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    {{-- Título del modal --}}
                                                    <h5 class="modal-title" id="exampleModalLabel">¿Seguro que deseas borrarla?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                {{-- Cuerpo del modal --}}
                                                <div class="modal-body">
                                                    {{-- Mensaje del modal --}}
                                                    Si eliminas esta imagen nunca podras recuperarla
                                                </div>
                                                <div class="modal-footer">
                                                    {{-- Boton de cancelar la eliminación --}}
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                        {{-- Boton para borrar definitivamente la imagen --}}
                                                    <a href="{{action('ImagenController@destroy',['id'=>$image->id_imagen])}}" class="btn btn-danger float-right">Borrar definitivamente</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                             {{-- Fina del modal --}}
                                    @endif
                                    <br>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
