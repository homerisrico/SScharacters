console.log('funcionando imagenes')

let formCargarImagenes = document.getElementById('formCargarImagenes');
const nombreImagen = document.getElementById('nombreImagen');
const closeModal = document.querySelector('#closeModal');


//CARGAR IMAGENES AL CARRUSEL

formCargarImagenes.addEventListener('submit',function(e){
    e.preventDefault();

    let formulario = new FormData(formCargarImagenes);

    fetch('http://localhost:8000/imagen',{
        method: 'POST',
        body: formulario
    })
    .then(datos => datos.text())
    .then(datos => {
        nombreImagen.innerHTML += `<p>${datos}</p>`;
        console.log(datos)
    })

});

//ELIMINAR IMAGENES DEL CARRUSEL

nombreImagen.addEventListener('click',function(e){   
    
    if(e.target.tagName == 'I'){
        
        fetch(`http://localhost:8000/saintdelete/${e.target.id}`)
            .then(datos => datos.text())
            .then(res => {
                console.log(res)
                let eliminarId = document.getElementById(res);
                eliminarId.innerHTML = '';
            })
            .catch(error => {
                console.log(error)
            })
    }
});

//RECARGAR PAGINA AL CERRAR EL MODAL

closeModal.addEventListener('click',function(){
    location.reload();
    console.log('closeModal')
});