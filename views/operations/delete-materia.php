<?php
require_once __DIR__ . "/../../controllers/materia-controller.php";

use Controllers\MateriaController;

$materiaController = new MateriaController();
$materiaController->deleteMateria($_POST);
if($materiaController){
    header("Location: ../dashboard-materias.php");
} else {
    echo "Error al actualizar el programa.";
}
?>