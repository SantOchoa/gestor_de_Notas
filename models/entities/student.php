<?php
namespace Models\Entities;

require_once __DIR__."/../entities/programa.php";
require __DIR__."/../utils/studentsql.php";

use Models\Entities\Programa;
use Models\Utils\Studentsql;
use Model\DataBase\GestorNotasDB;


class Student{
    private $codigo;
    private $nombre;
    private $email;
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
        $sql = Studentsql::selectAll();
        $db = new GestorNotasDB();
        $db->setIsSqlSelect(true);
        $result = $db->execSQL($sql);
        $rows = [];
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $student = new Student();
                $student->set('codigo', $item['codigo']);
                $student->set('nombre', $item['nombre']);
                $student->set('email', $item['email']);
                $student->set('programaCode', $item['programa']);
                array_push($rows, $student);
            }
        }
        return $rows;
    }

    public function save()
    {
        $sql = Studentsql::insertInto();
        $db = new GestorNotasDB();
        $result = $db->execSQL(
            $sql, 
            "ssss", 
            $this->codigo, 
            $this->nombre, 
            $this->email, 
            $this->programaCode 
        );
        return $result;
    }

    public function update()
    {
        $sql = Studentsql::update();
        $db = new GestorNotasDB();
        $result = $db->execSQL(
            $sql,
            "sssi",
            $this->nombre,
            $this->email,
            $this->programaCode,
            $this->codigo
        );
        return $result;
    }

    public function delete()
    {
        $sql = Studentsql::delete();
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
        $sql = Studentsql::selectByCode();
        $db = new GestorNotasDB();
        $db->setIsSqlSelect(true);
        $result = $db->execSQL(
            $sql,
            "i",
            $cod
        );
        $student = null;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $student = new Student();
                $student->set('codigo', $row['codigo']);
                $student->set('nombre', $row['nombre']);
                $student->set('email', $row['email']);
                $student->set('programaCode', $row['programa']);
                $nombreP = $student->get('nombre');
                break;
            }
        }
        
        return $nombreP;
    }
}
?>
