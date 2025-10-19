<?php
namespace Models\Entities;

require __DIR__."../database/gestor_notasdb.php";

use Model\DataBase\GestorNotasDB;


class Programa{
    private $cod;
    private $name;

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