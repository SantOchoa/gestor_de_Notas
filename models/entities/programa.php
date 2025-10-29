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
    public function all()
    {
        $sql = Programasql::selectAll();
        $db = new GestorNotasDB();
        $db->setIsSqlSelect(true);
        $result = $db->execSQL($sql);
        $rows = [];
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $student = new Programa();
                $student->set('codigo', $item['codigo']);
                $student->set('nombre', $item['nombre']);
                array_push($rows, $student);
            }
        }
        return $rows;
    }
    public function save()
    {
        $sql = Programasql::insertInto();
        $db = new GestorNotasDB();
        $result = $db->execSQL(
            $sql,
            "is",
            $this->codigo,
            $this->nombre
        );
        return $result;
    }


    public function update()
    {
        $sql = Programasql::update();
        $db = new GestorNotasDB();
        $result = $db->execSQL(
            $sql,
            "si",
            $this->nombre,
            $this->codigo
        );
        return $result;
    }

    public function delete()
    {
        $sql = Programasql::delete();
        $db = new GestorNotasDB();
        $result = $db->execSQL(
            $sql,
            "i",
            $this->codigo
        );
        return $result;
    }





    public function getByCode($cod)
    {
        $nombreP = "";
        $sql = Programasql::selectByCode();
        $db = new GestorNotasDB();
        $db->setIsSqlSelect(true);
        $result = $db->execSQL(
            $sql,
            "i",
            $cod
        );
        $programa = null;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $programa = new Programa();
                $programa->set('codigo',$row["codigo"])  ;
                $programa->set('nombre', $row['nombre']);
                $nombreP = $programa->get('nombre');
                break;
            }
        }
        return $nombreP;
    }
}



?>