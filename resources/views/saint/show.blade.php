@extends('layouts.app')
@section('title',$datos->nombre)
@section('content')
  
    <input type="hidden" value="{{$a = 1}}">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <div class="card text-center">
                    <div class="card-header">
                      <!-- Carga carrusel -->
                         <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($imagenes as $imagen)                                       
                                        @if($a == 1)
                                        <div class="carousel-item active">
                                         <img src="/image/carrusel/{{$imagen->ruta}}" width="200rem" height="300rem"  class="d-block w-100" alt="...">
                                         </div> 
                                         @else
                                         <div class="carousel-item">
                                         <img src="/image/carrusel/{{$imagen->ruta}}" width="200rem" height="300rem"  class="d-block w-100" alt="...">
                                         </div>   
                                        @endif
                                        <input type="hidden" value="{{$a++}}">  
                                    @endforeach                            
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                        </div>
                    </div>
                    
                    <!-- Descripcion Personaje -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="/image/character/{{$datos->imagen}}" class="" width="200rem" height="300rem" alt="...">     
                            </div>
                            <div class="col-sm-6">
                                <div class="card" >
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item text-left text-info">Nombre: <span class="text-dark">{{$datos->nombre}}</span></li>
                                        <li class="list-group-item text-left text-info">Constelacion: <span class="text-dark">{{$datos->constelacion}}</span></li>
                                        <li class="list-group-item text-left text-info">Pais: <span class="text-dark">{{$datos->pais}}</span></li>
                                        <li class="list-group-item text-left text-info">Edad: <span class="text-dark">{{$datos->edad}}</span></li>
                                        <li class="list-group-item text-left text-info">Serie: <span class="text-dark">{{$datos->serie}}</span></li>
                                        <li class="list-group-item text-left text-info">Clase: <span class="text-dark">{{$datos->clase}}</span></li>
                                        <li class="list-group-item text-left text-info">Info: <span class="text-dark">{{$datos->informacion}}</span></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                       
                        
                        
                    </div>
                    <div class="card-footer text-muted">
                        <div class="row">
                            <div class="col-sm-4">      
                             <!-- Button trigger modal -->                          
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                                    Cargar Imaganes
                                </button>                               
                            </div>
                            <div class="col-sm-4">
                                    <!-- Button editar personaje -->  
                                    <a href="http://localhost:8000/saint/{{$datos->slug}}/edit" class="btn btn-primary">Editar</a>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <form action="/saint/{{$datos->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{$datos->id}}">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                        
                     
                    </div>
                    </div>
            </div>
        </div>
    </div>

<!-- Modal cargar imagenes -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Imagenes Carrusel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                            <!-- Formulario de carga de imagenes -->
                                 <div class="form-group">
                                    <form action="/imagen" id="formCargarImagenes" method="post" enctype="multipart/form-control">
                                        @csrf
                                        <input type="hidden" name="saint_id" value="{{$datos->id}}">
                                        <input type="hidden" name="saint_slug" value="{{$datos->slug}}">
                                        <input type="file" name="ruta" class="form-control" required>
                                        <button type="submit" class="mt-2 btn btn-primary">Cargar</button>
                                    </form>                            
                                </div>
                                <!-- Impresion nombre de imagenes -->
                                <div id="nombreImagen">
                                    @foreach($imagenes as $imagen)
                                      <div id="{{$imagen->id}}">  {{$imagen->ruta}}<span>
                                        <i class="material-icons float-right" style="cursor:pointer" id="{{$imagen->id}}">delete</i></span>
                                      </div>
                                    @endforeach
                                </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>



@endsection