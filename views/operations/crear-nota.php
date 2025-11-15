<?php
require_once __DIR__ . "/../../controllers/nota-controller.php";

use Controllers\NotaController;

$notaController = new NotaController();
$notaController->saveNewNota($_POST);
if($notaController){

}else{
    header("Location: ../dashboard-notas.php");
}

?>