<?php
namespace Models\Entities;

require __DIR__."/../database/gestor_notasdb.php";
require __DIR__."/../utils/studentsql.php";
require __DIR__."/programa.php";

use Models\Entities\Programa;
use Models\Utils\Studentsql;
use Model\DataBase\GestorNotasDB;


class Student{
    private $codigo;
    private $nombre;
    private $email;
    private Programa $programa;

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
                array_push($rows, $student);
            }
        }
        return $rows;
    }

    public function find()
    {
        $sql = Studentsql::selectByUserCod();
        $db = new GestorNotasDB();
        $db->setIsSqlSelect(true);
        $result = $db->execSQL(
            $sql,
            "ss",
            $this->nombre,
            $this->codigo
        );
        $student = null;
        
            while ($row = $result->fetch_assoc()) {
                $student = new Student();
                $student->codigo = $row["codigo"];
                $student->nombre = $row["nombre"];
                $student->email = $row["email"];
                $programa = new Programa();
                $programa->set("cod", $row["programa"]);
                $student->programa = $programa;
                break;
            }
        return $student;
    }
    public function update()
    {
        $sql = Studentsql::update();
        $db = new GestorNotasDB();
        $result = $db->execSQL(
            $sql,
            "ssss",
            $this->codigo,
            $this->nombre,
            $this->email,
            $this->programa->get("id")
        );
        return $result;
    }
}
?>
