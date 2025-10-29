// Elementos del DOM
const botonesEditar = document.querySelectorAll('.btn.edit');
const overlayEditar = document.querySelector('.overlay-editar-estudiante');
const btnCancelarEdicion = overlayEditar.querySelector('.buttons-form button:first-child');
const formEditar = overlayEditar.querySelector('form');

// Función para mostrar el overlay de edición
const mostrarOverlayEditar = (studentData) => {
    // Rellenar el formulario con los datos del estudiante
    const nombreInput = overlayEditar.querySelector('#studentName');
    const emailInput = overlayEditar.querySelector('#email');

    // Obtener los datos de la fila seleccionada
    nombreInput.value = studentData.nombre;
    emailInput.value = studentData.email;
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
        const studentData = {
            codigo: fila.cells[0].textContent,
            nombre: fila.cells[1].textContent,
            email: fila.cells[2].textContent,
            programa: fila.cells[3].textContent
        };
        mostrarOverlayEditar(studentData);
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
