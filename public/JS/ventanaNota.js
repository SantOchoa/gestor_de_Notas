document.addEventListener("DOMContentLoaded", () => {

    const modalCrear = document.getElementById("modal-nota");
    const abrirCrearBtn = document.querySelector(".name-create button");
    const cerrarCrearBtn = document.getElementById("cerrarModal");
    const cancelarCrearBtn = document.getElementById("cancelarModal");

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

    
    const modalEditar = document.getElementById("modal-editar");
    const cerrarEditarBtn = document.getElementById("cerrarEditar");
    const cancelarEditarBtn = document.getElementById("cancelarEditar");
    const inputEditar = document.getElementById("notaEditar");
    const inputCodigoEditar = document.getElementById("estudianteC");
    const inputActividadEditar = document.getElementById("actividadM");

    const editarBtns = document.querySelectorAll(".btn.edit");

    editarBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const fila = e.target.closest("tr");
            const nombreActual = fila.children[3].innerText;
            const codigoActual = fila.children[0].innerText;
            const actividadActual = fila.children[2].innerText;
            inputActividadEditar.value = actividadActual;
            inputCodigoEditar.value = codigoActual;
            inputEditar.value = nombreActual;
            modalEditar.style.display = "block";
        });
    });

    [cerrarEditarBtn, cancelarEditarBtn].forEach(btn => {
        btn.addEventListener("click", () => modalEditar.style.display = "none");
    });

    
    let codigoSeleccionado = null;

    const divConfirmacion = document.getElementById('confirmacionEliminar');
    const btnCancelarEliminar = document.getElementById('cancelarEliminar');
    const btnContinuarEliminar = document.getElementById('continuarEliminar');

    const eliminarBtns = document.querySelectorAll(".btn.delete, .btn-eliminar-nota");
    const inputCodigoEli = document.getElementById("estudianteCE");

    eliminarBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const fila = e.target.closest("tr");
            const codigoActual = fila.children[0].innerText;
            inputCodigoEli.value = codigoActual;
            
            codigoSeleccionado = codigoActual;

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

    const form = document.getElementById("formCalificaciones");
    const selectEstudiante = document.getElementById("selectEstudiante");
    const selectMateria = document.getElementById("selectMateria");
    const inputNota = document.getElementById("inputNota");

    const API_URL = "dashboard-notas.php"; 

    
    fetch(`${API_URL}?accion=get_estudiantes`)
        .then(response => response.json())
        .then(data => {
            selectEstudiante.innerHTML = '<option value="">-- Elige un estudiante --</option>';
            data.forEach(estudiante => {
                let option = document.createElement("option");
                option.value = estudiante.codigo; 
                option.textContent = estudiante.nombre; 
                selectEstudiante.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error al cargar estudiantes:', error);
            selectEstudiante.innerHTML = '<option value="">-- Error al cargar --</option>';
        });

    selectEstudiante.addEventListener("change", function() {
        const estudianteCodigo = this.value;
        
        selectMateria.innerHTML = '<option value="">-- Cargando materias... --</option>';
        selectMateria.disabled = true;
        inputNota.value = "";
        inputNota.disabled = true;

        if (estudianteCodigo) {
            fetch(`${API_URL}?accion=get_materias&estudiante_codigo=${estudianteCodigo}`)
                .then(response => response.json())
                .then(data => {
                    selectMateria.innerHTML = '<option value="">-- Elige una materia --</option>';
                    data.forEach(materia => {
                        let option = document.createElement("option");
                        option.value = materia.codigo;
                        option.textContent = materia.nombre;
                        selectMateria.appendChild(option);
                    });
                    selectMateria.disabled = false;
                })
                .catch(error => {
                    console.error('Error al cargar materias:', error);
                    selectMateria.innerHTML = '<option value="">-- Error al cargar --</option>';
                });
        } else {
            selectMateria.innerHTML = '<option value="">-- Esperando estudiante --</option>';
        }
    });

    selectMateria.addEventListener("change", function() {
        if (this.value) {
            inputNota.disabled = false;
            inputNota.focus();
        } else {
            inputNota.disabled = true;
        }
    });

    form.addEventListener("submit", function(e) {
        const formData = new FormData(form);
        
        fetch(`${API_URL}?accion=guardar_nota`, {
            method: 'POST',
            body: formData 
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                form.reset();
                selectMateria.innerHTML = '<option value="">-- Esperando estudiante --</option>';
                selectMateria.disabled = true;
                inputNota.disabled = true;
            }
        });
        
    });
});