<?php
namespace Controllers;

require __DIR__."/../models/entities/programa.php";
use Models\Entities\Programa;

class ProgramController{

    public function getPrograms(){
        $program = new Programa();
        return $program->all();
    }
}


?>