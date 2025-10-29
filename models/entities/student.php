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
    public function getP()
    {
        $codigoP = $this->programa->get('codigo');
        $nombreP = $this->programa->get('nombre');
        return ;
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
                $program = new Programa();
                $program->set('codigo', $item['codigo']);
                $program->set('name', $item['nombre']);
                $student->set('programa', $program);
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
            $this->programa->get('codigo')
        );
        return $result;
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
            $this->programa->get('codigo')
        );
        return $result;
    }

    public function delete()
    {
        $sql = Studentsql::delete();
        $db = new GestorNotasDB();
        $result = $db->execSQL(
            $sql,
            "s",
            $this->codigo
        );
        return $result;
    }
}
?>
