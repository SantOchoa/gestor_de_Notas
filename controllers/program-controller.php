<?php
namespace Controllers;

require __DIR__."/../models/entities/programa.php";
use Models\Entities\Programa;

class ProgramController{

    public function getPrograms(){
        $program = new Programa();
        return $program->all();
    }
    public function saveNewProgram($data){
        $program = new Programa();
        $program->set('nombre', $data['nombrePrograma']);
        $program->set('codigo', $data['codigo']);
        return $program->save();
    }
    public function updateProgram($data){
        $program = new Programa();
        $program->set('nombre', $data['editarNombre']);
        $program->set('codigo', $data['codigoE']);
        return $program->update();
    }

}


?>