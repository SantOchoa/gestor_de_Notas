<?php
namespace Models\Entities;

require_once __DIR__."/../utils/materiasql.php";
require_once __DIR__."/programa.php";

use Models\Utils\MateriaSQL;
use Models\Entities\Programa;
use Model\DataBase\GestorNotasDB;

class Materia{
    private $cod;
    private $name;
    private $programaCode;

    public function set($prop, $val)
    {
        $this->{$prop} = $val;
    }
    public function get($prop)
    {
        return $this->{$prop};
    }
    public function getP()
    {
        $programa = new Programa();
        $nombreP = $programa->getByCode($this->programaCode);
        return $nombreP;
    }
    public function all()
    {
        $sql = MateriaSQL::selectAll();
        $db = new GestorNotasDB();
        $db->setIsSqlSelect(true);
        $result = $db->execSQL($sql);
        $rows = [];
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $materia = new Materia();
                $materia->set('cod', $item['codigo']);
                $materia->set('name', $item['nombre']);
                $materia->set('programaCode', $item['programa']);
                array_push($rows, $materia);
            }
        }
        return $rows;
    }
    public function getByCode($cod)
    {
        $nombreP = "";
        $sql = MateriaSQL::selectByCode();
        $db = new GestorNotasDB();
        $db->setIsSqlSelect(true);
        $result = $db->execSQL(
            $sql,
            "i",
            $cod
        );
        $materia = null;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $materia = new Materia();
                $materia->set('cod', $row['codigo']);
                $materia->set('name', $row['nombre']);
                $materia->set('programaCode', $row['programa']);
                $nombreP = $materia->get('name');
                break;
            }
        }
        return $nombreP;
    }
    public function save()
    {
        $sql = MateriaSQL::insertInto();
        $db = new GestorNotasDB();
        $result = $db->execSQL(
            $sql,
            "isi",
            $this->cod,
            $this->name,
            $this->programaCode
        );
        return $result;
    }
    public function update()
    {
        $sql = MateriaSQL::update();
        $db = new GestorNotasDB();
        $result = $db->execSQL(
            $sql,
            "sii",
            $this->name,
            $this->programaCode,
            $this->cod
        ); 
        return $result;
    }
    public function delete()
    {
        $sql = MateriaSQL::delete();
        $db = new GestorNotasDB();
        $result = $db->execSQL(
            $sql,
            "i",
            $this->cod
        );
        return $result;
    }

}
?>