<?php
namespace Controllers;
require_once __DIR__ . "/../models/entities/materia.php";
use Models\Entities\Materia;

class MateriaController
{
    public function getAllMaterias()
    {
        $materia = new Materia();
        return $materia->all();
    }
    public function saveNewMateria($data){
        $materia = new Materia();
        $materia->set('name', $data['nombreMateria']);
        $materia->set('cod', $data['codigo']);
        $materia->set('programaCode',$data['programaSelect']);
        return $materia->save();
    }
    public function updateMateria($data){
        $materia = new Materia();
        $materia->set('cod', $data['codigoE']);
        $materia->set('name', $data['editarNombre']);
        $materia->set('programaCode',$data['programaSelect']);
        return $materia->update();
    }
    public function deleteMateria($data){
        $materia = new Materia();
        $materia->set('cod', $data['codigoEli']);
        return $materia->delete();
    }
    public function getAllMateriaPrograma($programa_codigo)
    {
        $materia = new Materia();
        return $materia->allByPrograma($programa_codigo);
    }

}
?>