<?php
namespace Controllers;
require __DIR__ . "/../models/entities/nota.php";
require_once __DIR__ . "/../models/entities/student.php";
use Models\Entities\Nota;
use Models\Entities\Student;
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
    public function updateNota($data){
        $nota = new Nota();
        $student = new Student();
        $nota->set('actividad', $data['actividadM']);
        $nota->set('studentCode',$student->getByName($data['estudianteC']));
        $nota->set('nota', $data['nota']);
        return $nota->update();
    }
    
}
?>
