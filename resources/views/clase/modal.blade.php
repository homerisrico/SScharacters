<!-- Modal -->
<div class="modal fade" id="modalClase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Crear clase</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--  Formulario para cargar clase -->
            <form id="formClase" class="form-group">
                @csrf
                <label for="nombre">Nombre</label>
                <input type="text" id="nombreClase" class="form-control" name="nombre" placeholder="Primera letra en mayuscula" required>
                <button type="submit" class="btn btn-success mt-2">Cargar</button>
            </form>
        <div id="listaClases">

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>

<script>
    //window.onload = cargaClase;

    const form = document.querySelector('#formClase');

    form.addEventListener('submit',envio);
      
    

    function envio(e){
        e.preventDefault();
        const dato = new FormData(form);

        fetch('http://localhost:8000/clase',{
          method:'post',
          body:dato
        })
          .then(datos => datos.text())
          .then(respuesta => {
            console.log(respuesta);

          },
          error => {
            console.log(error);
          })
          
          const nombreClase = document.getElementById('nombreClase');
          console.log(nombreClase);
          nombreClase.value = '';

    }


    //carga de contenido en el modal
    const listaClases = document.getElementById('listaClases');
    const modalClaseId = document.getElementById('modalClaseId');
    

    modalClaseId.addEventListener('click',cargaClase);

    function cargaClase(){
      fetch('http://localhost:8000/clase')
        .then(datos => datos.json())
        .then(respuesta => {
          //console.log(respuesta)
          
          listaClases.innerHTML ='';
          for(let linea of respuesta){
            listaClases.innerHTML += linea.nombre +'</br>';
          }

          
        },
        error => {
          console.log(error);
        })
      
    }

    
</script>