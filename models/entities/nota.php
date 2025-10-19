<?php
namespace Models\Entities;


require __DIR__."../database/gestor_notasdb.php";
require __DIR__."/student.php";
require __DIR__."/materia.php";

use Model\DataBase\GestorNotasDB;
use Models\Entities\Student;
use Models\Entities\Materia;

class Nota{
    private Materia $materia;
    private Student $student;
    private $actividad;
    private $nota;

    public function set($prop, $val)
    {
        $this->{$prop} = $val;
    }
    public function get($prop)
    {
        return $this->{$prop};
    }

    
}

?>