// Elementos del DOM
const btnCrear = document.getElementById('crear');
const overlay = document.querySelector('.overlay-crear-nota');
const btnCancelar = overlay.querySelector('.buttons-form button:first-child');
const form = overlay.querySelector('form');

// Función para mostrar el overlay
const mostrarOverlay = () => {
    overlay.style.display = 'flex';
    // Agregar clase para la animación de entrada
    setTimeout(() => {
        overlay.style.opacity = '1';
    }, 10);
};

// Función para ocultar el overlay
const ocultarOverlay = () => {
    overlay.style.opacity = '0';
    setTimeout(() => {
        overlay.style.display = 'none';
        // Limpiar el formulario
        form.reset();
    }, 300); // Tiempo igual a la duración de la transición
};

// Event Listeners
btnCrear.addEventListener('click', mostrarOverlay);

btnCancelar.addEventListener('click', (e) => {
    e.preventDefault(); // Prevenir el comportamiento por defecto del botón
    ocultarOverlay();
});

// Cerrar el overlay si se hace clic fuera del formulario
overlay.addEventListener('click', (e) => {
    if (e.target === overlay) {
        ocultarOverlay();
    }
});

// Manejar el envío del formulario
form.addEventListener('submit', (e) => {
    e.preventDefault();
    // Aquí irá la lógica para enviar los datos del estudiante
    // Por ahora solo ocultamos el overlay
    ocultarOverlay();
}); 
