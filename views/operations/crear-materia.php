<?php
require __DIR__ . "/../../controllers/materia-controller.php";

use Controllers\MateriaController;

$materiaController = new MateriaController();
$materiaController->saveNewMateria($_POST);
header("Location: ../dashboard-materias.php");
?>