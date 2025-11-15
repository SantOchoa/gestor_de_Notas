<?php
require_once __DIR__ . "/../../controllers/student-controller.php";

use Controllers\StudentController;

$studentController = new StudentController();
$studentController->updateStudent($_POST);
if($studentController){
    header("Location: ../dashboard-students.php");
} else {
    echo "Error al actualizar el programa.";
}
?>