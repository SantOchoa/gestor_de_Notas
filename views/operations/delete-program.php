<?php
require_once __DIR__ . "/../../controllers/program-controller.php";

use Controllers\ProgramController;

$programController = new ProgramController();
$programController->deleteProgram($_POST);
if($programController){
    header("Location: ../dashboard-programs.php");
} else {
    echo "Error al actualizar el programa.";
}
?>