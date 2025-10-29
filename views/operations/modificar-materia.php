<?php
require __DIR__ . "/../../controllers/materia-controller.php";

use Controllers\MateriaController;

$materiaController = new MateriaController();
$materiaController->updateMateria($_POST);
if($materiaController){
    header("Location: ../dashboard-materias.php");
} else {
    echo "Error al actualizar el programa.";
}
?>