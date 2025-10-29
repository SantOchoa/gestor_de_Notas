<?php
namespace Controllers;
require __DIR__ . "/../models/entities/nota.php";
use Models\Entities\Nota;
class NotaController
{
    public function getAllNotas()
    {
        $nota = new Nota();
        return $nota->all();
    }
}
?>
