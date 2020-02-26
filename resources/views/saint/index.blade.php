@extends('layouts.app')
@section('content')

    <div class="container">
    <div class="row">
  
    @foreach($datos as $dato)
       
    <div class="col-sm-4">

                <div class="card mt-3" style="width: 16rem;">
                    <div class="card-header">
                        <img src="/image/character/{{$dato->imagen}}" style="width: 13.5rem; height: 12rem;" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body text-center">
                            <h5 class="card-title">{{ $dato->titulo }}</h5>                            
                            <a href="/saint/{{ $dato->slug }}" class="btn btn-primary">Ver</a>
                    </div>
                </div>
    </div>
            
            
    @endforeach
   
    </div>
    </div>
@endsection

