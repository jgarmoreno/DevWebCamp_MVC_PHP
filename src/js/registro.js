import Swal from 'sweetalert2'

(function (){
    let eventos = [];

    const resumen = document.querySelector('#registro-resumen');
    if(resumen) {
        const eventosBoton = document.querySelectorAll('.evento__agregar');
        eventosBoton.forEach(boton => boton.addEventListener('click', seleccionarEvento));

        const formularioRegistro = document.querySelector('#registro');
        formularioRegistro.addEventListener('submit', submitFormulario);

        mostrarEventos();
    

        function seleccionarEvento({target}) {

            if(eventos.length < 5 ) {
                // Deshabilitar el evento cuando es seleccionado
                target.disabled = true;

                eventos = [...eventos, {
                    id: target.dataset.id,
                    titulo: target.parentElement.querySelector('H4').textContent.trim()
                }];

                mostrarEventos();
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'Solo puedes reservar hasta cinco eventos',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }

        }

        function mostrarEventos() {
            // Limpiar objeto del  evento repetido
            limpiarEventos();

            if(eventos.length > 0) {
                eventos.forEach(evento => {
                    const eventoDOM = document.createElement('DIV');
                    eventoDOM.classList.add('registro__evento');


                    const titulo = document.createElement('h3');
                    titulo.classList.add('registro__nombre');
                    titulo.textContent = evento.titulo;

                    const botonEliminar = document.createElement('BUTTON');
                    botonEliminar.classList.add('registro__eliminar');
                    botonEliminar.innerHTML = `<i class="fa-solid fa-trash"></i>`
                    botonEliminar.onclick = function() {
                        eliminarEvento(evento.id);
                    }

                    // Renderizar en el HTML
                    eventoDOM.appendChild(titulo);
                    eventoDOM.appendChild(botonEliminar);
                    resumen.appendChild(eventoDOM);
                })
            } else {
                const noRegistro = document.createElement('P');
                noRegistro.textContent = 'Ningún evento seleccionado';
                noRegistro.classList.add('registro__texto');
                resumen.appendChild(noRegistro);
            }
        }

        function eliminarEvento(id) {
            eventos = eventos.filter(evento => evento.id !== id);
            const botonAgregar = document.querySelector(`[data-id="${id}"]`);
            botonAgregar.disabled = false;
            mostrarEventos();
        }

        function limpiarEventos () {
            while(resumen.firstChild) {
                resumen.removeChild(resumen.firstChild);
            }
        }
    
        async function submitFormulario(e) {
            // Se previene el default del boton que activa el evento, un submit. Por lo tanto no envía el formulario
            
            e.preventDefault();

            // Obtener regalo
            const regaloId = document.querySelector('#regalo').value;
            const eventosId = eventos.map(evento => evento.id);

            if(eventosId.length === 0 || regaloId === '') {
                Swal.fire({
                    title: 'Error',
                    text: 'Debes elegir al menos un evento y un regalo',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            const datos = new FormData();
            datos.append('eventos', eventosId);
            datos.append('regalo_id', regaloId);

            const url = '/finalizar-registro/conferencias';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });

            const resultado = await respuesta.json();

            console.log(resultado);
            if(resultado.resultado) {
                Swal.fire(
                    'La reserva se realizó con éxito',
                    'Disfruta de DevWebCamp',
                    'success'
                ).then(() => location.href = `/entrada?id=${resultado.token}`);
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'La reserva no pudo completarse, inténtelo de nuevo',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(() => location.reload());
            }
        }
    
    }
})();