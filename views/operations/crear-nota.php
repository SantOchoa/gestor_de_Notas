<?php
require __DIR__ . "/../../controllers/nota-controller.php";

use Controllers\NotaController;

$notaController = new NotaController();
$notaController->saveNewNota($_POST);
header("Location: ../dashboard-programs.php");
?>