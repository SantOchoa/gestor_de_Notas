<?php
namespace Models\Entities;

require __DIR__."../database/gestor_notasdb.php";
require __DIR__."/programa.php";

use Models\Entities\Programa;
use Model\DataBase\GestorNotasDB;

class Materia{
    private $cod;
    private $name;
    private Programa $programa;

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