<?php
require __DIR__ . "/../../controllers/student-controller.php";
use Controllers\StudentController;

$studentController = new StudentController();

$student = $studentController->deleteStudent($_POST);

if($student){
    header("Location: ../dashboard-students.php");
}