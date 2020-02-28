@extends('layouts.app')
@section('title','Editar')
@section('content')

    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">            
            
            <img src="/image/character/{{$datos->imagen}}" alt="saint seiya" width="300px" height="200px">
            
            <div class="form-group mt-3">
                <form action="/saint/{{$datos->slug}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" value="{{$datos->titulo}}" class="form-control">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" value="{{$datos->imagen}}" class="form-control">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value="{{$datos->nombre}}" class="form-control">
                    <label for="constelacion">Constelacion</label>
                    <input type="text" name="constelacion" value="{{$datos->constelacion}}" class="form-control">
                    <label for="pais">Pais</label>
                    <input type="text" name="pais" value="{{$datos->pais}}" class="form-control">
                    <label for="edad">Edad</label>
                    <input type="text" name="edad" value="{{$datos->edad}}" class="form-control">
                    <label for="serie">Serie</label>
                    <input type="text" name="serie" value="{{$datos->serie}}" class="form-control">
                    <label for="clase">Clase</label>
                    <input type="text" name="clase" value="{{$datos->clase}}" class="form-control">
                    <label for="informacion">Informacion</label>
                    <textarea name="informacion" cols="30" rows="2" class="form-control">{{$datos->informacion}}</textarea>
                    <button type="submit" class="btn btn-primary form-control mt-2">Actualizar</button>
                </form>
            </div>
        </div>
        <div class="col-sm-3"></div>    
    </div>
@endsection

