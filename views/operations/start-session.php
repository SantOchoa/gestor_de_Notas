<?php
require __DIR__ . "/../../controllers/student_controller.php";
use Controllers\StudentController;

$studentController = new StudentController();

$student = $studentController->validarUsuario($_POST);

if(!empty($student)){
    header("Location: ../dashboard-programs.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Sesión invalida <?php $student ?></h1>
    <br>
    <a href="../login.php">Volver a inicio</a>
</body>
</html>