document.addEventListener("DOMContentLoaded", () => {

    const modalCrear = document.getElementById("modal-programa");
    const abrirCrearBtn = document.querySelector(".name-create button");
    const cerrarCrearBtn = document.getElementById("cerrarModal");
    const cancelarCrearBtn = document.getElementById("cancelarModal");
    const formCrear = document.getElementById("form-programa");

    abrirCrearBtn.addEventListener("click", () => {
        modalCrear.style.display = "block";
    });


    [cerrarCrearBtn, cancelarCrearBtn].forEach(btn => {
        btn.addEventListener("click", () => modalCrear.style.display = "none");
    });


    window.addEventListener("click", e => {
        if (e.target === modalCrear) modalCrear.style.display = "none";
        if (e.target === modalEditar) modalEditar.style.display = "none";
    });

    formCrear.addEventListener("submit", (e) => {
        e.preventDefault();
        const nombre = document.getElementById("nombrePrograma").value.trim();
        if (nombre === "") return alert("Por favor ingrese un nombre válido.");
        alert(`Programa "${nombre}" creado exitosamente.`);
        formCrear.reset();
        modalCrear.style.display = "none";
    });


 
    const modalEditar = document.getElementById("modal-editar");
    const cerrarEditarBtn = document.getElementById("cerrarEditar");
    const cancelarEditarBtn = document.getElementById("cancelarEditar");
    const formEditar = document.getElementById("form-editar");
    const inputEditar = document.getElementById("editarNombre");


    const editarBtns = document.querySelectorAll(".btn.edit");

    editarBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {

            const fila = e.target.closest("tr");
            const nombreActual = fila.children[1].innerText;
            inputEditar.value = nombreActual;
            modalEditar.style.display = "block";

 
            formEditar.dataset.filaSeleccionada = fila.rowIndex;
        });
    });


    [cerrarEditarBtn, cancelarEditarBtn].forEach(btn => {
        btn.addEventListener("click", () => modalEditar.style.display = "none");
    });

    formEditar.addEventListener("submit", (e) => {
        e.preventDefault();

        const nuevoNombre = inputEditar.value.trim();
        if (nuevoNombre === "") return alert("Por favor ingrese un nombre válido.");

        const index = formEditar.dataset.filaSeleccionada;
        const tabla = document.querySelector("table tbody");
        const fila = tabla.rows[index - 1]; 

        fila.children[1].innerText = nuevoNombre;

        alert(`Programa actualizado a "${nuevoNombre}".`);
        modalEditar.style.display = "none";
    });

let codigoSeleccionado = null;

const divConfirmacion = document.getElementById('confirmacionEliminar');
const btnCancelarEliminar = document.getElementById('cancelarEliminar');
const btnContinuarEliminar = document.getElementById('continuarEliminar');

const eliminarBtns = document.querySelectorAll(".btn.delete, .btn-eliminar-programa");

eliminarBtns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    const fila = e.target.closest("tr");
    if (!fila) return; 

    codigoSeleccionado = fila.dataset.codigo ? fila.dataset.codigo.trim() : fila.children[0].innerText.trim();
    divConfirmacion.style.display = "flex";
  });
});

btnCancelarEliminar.addEventListener('click', () => {
  codigoSeleccionado = null;
  divConfirmacion.style.display = 'none';
});

btnContinuarEliminar.addEventListener('click', () => {
  if (!codigoSeleccionado) return;

  
  let fila = document.querySelector(`tr[data-codigo="${codigoSeleccionado}"]`);

  if (!fila) {
    const rows = document.querySelectorAll('table tbody tr');
    for (const r of rows) {
      if (r.children[0] && r.children[0].innerText.trim() === codigoSeleccionado) {
        fila = r;
        break;
      }
    }
  }

  if (fila) fila.remove();

  codigoSeleccionado = null;
  divConfirmacion.style.display = 'none';
});

window.addEventListener("click", (e) => {
  if (e.target === divConfirmacion) {
    codigoSeleccionado = null;
    divConfirmacion.style.display = "none";
  }
});


});
