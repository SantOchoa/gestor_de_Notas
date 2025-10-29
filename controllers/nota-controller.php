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

    public function saveNewNota($data){
        $nota = new Nota();
        $nota->set('studentCode', $data['estudiante']);
        $nota->set('materiaCode', $data['materia']);
        $nota->set('actividad', $data['actividad']);
        $nota->set('nota', $data['nota']);
        return $nota->save();
    }
}
?>
