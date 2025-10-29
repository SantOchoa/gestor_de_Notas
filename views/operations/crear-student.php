<?php
require __DIR__ . "/../../controllers/student-controller.php";

use Controllers\StudentController;

$studentController = new StudentController();
$studentController->saveNewStudent($_POST);
if($studentController){
    header("Location: ../dashboard-students.php");
}
?>