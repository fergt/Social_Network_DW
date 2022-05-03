
                @foreach ($all_users as $user)

                    <div class="card border-primary mb-3">
                    <br>

                      @if(is_null($user->image))
                        <img src="{{ asset('images/default-avatar.png') }}" alt="{{ Auth::user()->name }}" class="card-img-top" style="max-width:100%;width:auto;height:auto;">
                      @else
            
                        <img src="{{route('user.image',['filename' => $user->image ])}}" class="card-img-top" width="59" height="35"  alt="{{ Auth::user()->name }}" style="max-width:100%;width:auto;height:auto;" >
            
                      @endif 

                      <div class="card-body ">
                        <h5 class="text-md-center">{{$user->name}}</h5>
                      </div>
                      <div class="card-footer">
                        <a class="btn btn-sm btn-info" href="{{action('UsuariosController@profile',['id' => $user->id])}}">Visitar perfil</a>
                      </div>
                    </div>
              @endforeach