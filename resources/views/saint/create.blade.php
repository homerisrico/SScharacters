@extends('layouts.app')
@section('title', 'Create')
@section('content')

    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">            
            
            <img src="/image/saint_seiya.png" alt="saint seiya" width="540px" height="200px">
            
            <div class="form-group mt-3">
                <form action="/saint" method="post" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" class="form-control" required>
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" class="form-control" required>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                    <label for="constelacion">Constelacion</label>
                    <input type="text" name="constelacion" class="form-control" required>
                    <label for="pais">Pais</label>
                    <input type="text" name="pais" class="form-control" required>
                    <label for="edad">Edad</label>
                    <input type="text" name="edad" class="form-control" required>
                    <label for="serie">Serie</label>
                    <input type="text" name="serie" class="form-control" required>
                    <label for="clase">Clase</label>
                    <input type="text" name="clase" class="form-control" required>
                    <label for="informacion">Informacion</label>
                    <textarea name="informacion" cols="30" rows="2" class="form-control" required></textarea>
                    <button type="submit" class="btn btn-primary form-control mt-2">Enviar</button>
                </form>
            </div>
        </div>
        <div class="col-sm-3"></div>    
    </div>
@endsection

