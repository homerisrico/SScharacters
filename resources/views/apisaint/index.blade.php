       
        <div class="container">
            <div class="row">
        
            @foreach($datos as $dato)
            
            <div class="col-sm-4">

                        <div class="card mt-3" style="width: 16rem;">
                            <div class="card-header">
                            <!-- <a data-toggle="modal" data-target="#exampleModal"></a> -->
                            <img id="{{$dato->id}}" src="http://127.0.0.1:8000/image/character/{{$dato->imagen}}" style="width: 13.5rem; height: 12rem;" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body text-center">
                                    <h5 class="card-title">{{ $dato->titulo }}</h5>                            
                                    
                            </div>
                        </div>
            </div>
                    
                    
            @endforeach

            </div>
        </div>
        