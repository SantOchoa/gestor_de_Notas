<?php
namespace Controllers;
require_once __DIR__ . "/../models/entities/nota.php";
require_once __DIR__ . "/../models/entities/student.php";
require_once __DIR__ . "/../models/entities/materia.php";
use Models\Entities\Nota;
use Models\Entities\Student;
use Models\Entities\Materia;
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
    public function getPromedioByStudent($data){
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
    public function deleteNota($data){
        $nota = new Nota();
        $student = new Student();
        $nota->set('studentCode',$student->getByName($data['estudianteCE']));
        return $nota->delete();
    }
    public function getAllNotasPorMateria($materia_codigo)
    {
        $nota = new Nota();
        return $nota->allByMateria($materia_codigo);
    }

    public function getAllNotasPorStudent($student_codigo)
    {
        $nota = new Nota();
        return $nota->allByStudent($student_codigo);
    }
    public function getAllNotasPorMateriaStudent($student_codigo, $materia_codigo)
    {
        $nota = new Nota();
        return $nota->allByMateriaStudent($student_codigo, $materia_codigo);
    }
        
}
?>
