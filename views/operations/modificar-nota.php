<?php
require __DIR__ . "/../../controllers/nota-controller.php";

use Controllers\NotaController;
$notaController = new NotaController();
$notaController->updateNota($_POST);
if($notaController){
    header("Location: ../dashboard-notas.php");
} else {
    echo "Error al actualizar la nota.";
}
?>