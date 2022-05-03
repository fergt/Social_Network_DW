<div class="col-md-12">
    @if(Auth::user()->image)
        <img src="{{route('user.image',['filename' => Auth::user()->image])}}" alt="" class="col-md-12 rounded-radius" >
    @else
        @php
            echo "Agrega un Avatar a tu perfil!"
        @endphp
    @endif
</div>