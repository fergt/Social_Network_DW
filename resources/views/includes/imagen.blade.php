    <div class="card">
        <div class="main_image">
            <div class="card-body">
                <a href="{{action('ImagenController@show',['id' => $image->id_imagen])}}"><img src="{{route('image.get',['filename' => $image->image_path])}}" alt="" class="col-md-12"></a>
                <br>
                <br>
                <div class="col-md-12">
                    <p style="color:#949393; font-size: 14px;"> {{$image->description}}</p>
                    <div class="col-md-12">
                        <p style="color:#949393; font-size: 14px;" class="float-right">{{$image->created_at}}</p>
                    </div>
                    <div class="col-md-10">Publicado por:
                        <a href="{{action('UsuariosController@profile',['id' => $image->fk_id_user])}}">  {{$image->user->name.' '.$image->user->apellido}} </a>
                    </div>
                    <br>
                </div>    
            </div>
        </div>  {{-- <img src="{{url('user.image',['filename' => Auth::user()->image])}}" alt="" class="col-md-12" > --}}  
    </div>
    <br>