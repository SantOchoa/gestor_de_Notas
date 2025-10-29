    document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("modal-programa");
    const abrirBtn = document.querySelector(".name-create button");
    const cerrarBtn = document.getElementById("cerrarModal");
    const cancelarBtn = document.getElementById("cancelarModal");
    const form = document.getElementById("form-programa");

    
    abrirBtn.addEventListener("click", () => {
        modal.style.display = "block";
    });

    
    cerrarBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    cancelarBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    
    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });

    
    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const nombre = document.getElementById("nombrePrograma").value.trim();
        if (nombre === "") {
            alert("Por favor ingrese un nombre válido.");
            return;
        }

         
        alert(`Programa "${nombre}" creado exitosamente.`);

  
        form.reset();
        modal.style.display = "none";
    });
});
