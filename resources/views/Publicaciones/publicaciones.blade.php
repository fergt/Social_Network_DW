@extends('layouts.app')

@section('content')

<main class="page-content">
     
      <div class="container">
        <div class="card-header text-center"><h2 style="color:black;">{{ __('Nuevas publicaciones') }}</h2></div>
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
                        <div class="card-footer justify-content-center">{{ $images->links() }}</div>
                        
                    </div>
                </div>
            </div>

          </div>
        </div>
</main>

@endsection



