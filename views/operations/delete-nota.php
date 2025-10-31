<?php
require_once __DIR__ . "/../../controllers/nota-controller.php";

use Controllers\NotaController;

$notaController = new NotaController();
$notaController->deleteNota($_POST);
header("Location: ../dashboard-notas.php");
?>