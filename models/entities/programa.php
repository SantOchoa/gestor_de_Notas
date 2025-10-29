<?php

namespace Models\Entities;


require __DIR__."/../utils/programasql.php";
require __DIR__."/../database/gestor_notasdb.php";

use Model\DataBase\GestorNotasDB;
use Models\Utils\Programasql;



class Programa {
    private $codigo;
    private $nombre;

    public function set($prop, $val)
    {
        $this->{$prop} = $val;
    }
    public function get($prop)
    {
        return $this->{$prop};
    }
    public function getByCode($codigoP)
    {
        $sql = Programasql::selectByCode();
        $db = new GestorNotasDB();
        $db->setIsSqlSelect(true);
        $result = $db->execSQL(
            $sql,
            "s",
            $codigoP
        );
        $programa = null;
        $nombreP = "";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $programa = new Programa();
                $programa->codigo = $row["codigo"];
                $nombreP=$programa->nombre = $row["nombre"];
                break;
            }
        }
        return $nombreP;
    }
}



?>