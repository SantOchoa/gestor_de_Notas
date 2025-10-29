<?php
namespace Controllers;
require __DIR__ . "/../models/entities/materia.php";
use Models\Entities\Materia;

class MateriaController
{
    public function getAllMaterias()
    {
        $materia = new Materia();
        return $materia->all();
    }
}
?>