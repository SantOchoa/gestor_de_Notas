<?php
require_once __DIR__ . "/../../controllers/program-controller.php";

use Controllers\ProgramController;

$programController = new ProgramController();
$programController->saveNewProgram($_POST);
header("Location: ../dashboard-programs.php");
?>