// Elementos del DOM
const botonesEditar = document.querySelectorAll('.btn.edit');
const overlayEditar = document.querySelector('.overlay-editar-nota');
const btnCancelarEdicion = overlayEditar.querySelector('.buttons-form button:first-child');
const formEditar = overlayEditar.querySelector('form');

// Función para mostrar el overlay de edición
const mostrarOverlayEditar = (NotaData) => {
    const nombreInput = overlayEditar.querySelector('#studentName');
    const materiaInput = overlayEditar.querySelector('#materia');
    const notaInput = overlayEditar.querySelector('#nota');

    // Obtener los datos de la fila seleccionada
    nombreInput.value = NotaData.nombre;
    materiaInput.value = NotaData.materia;
    nombreInput.value = NotaData.nota;
    // El programa se seleccionará cuando tengamos la lista de programas

    overlayEditar.style.display = 'flex';
    setTimeout(() => {
        overlayEditar.style.opacity = '1';
    }, 10);
};

// Función para ocultar el overlay
const ocultarOverlayEditar = () => {
    overlayEditar.style.opacity = '0';
    setTimeout(() => {
        overlayEditar.style.display = 'none';
        formEditar.reset();
    }, 300);
};

// Event Listeners
botonesEditar.forEach(boton => {
    boton.addEventListener('click', () => {
        // Obtener los datos de la fila
        const fila = boton.closest('tr');
        const NotaData = {
            estudiante: fila.cells[0].textContent,
            materia: fila.cells[1].textContent,
            nota: fila.cells[2].textContent,
        };
        mostrarOverlayEditar(NotaData);
    });
});

btnCancelarEdicion.addEventListener('click', (e) => {
    e.preventDefault();
    ocultarOverlayEditar();
});

// Cerrar el overlay si se hace clic fuera del formulario
overlayEditar.addEventListener('click', (e) => {
    if (e.target === overlayEditar) {
        ocultarOverlayEditar();
    }
});

// Manejar el envío del formulario de edición
formEditar.addEventListener('submit', (e) => {
    e.preventDefault();
    
    // Aquí irá la lógica para actualizar los datos del estudiante
    // Por ahora solo ocultamos el overlay
    ocultarOverlayEditar();
});