<?php
namespace Models\Entities;


require __DIR__."/../utils/notasql.php";
require __DIR__."/student.php";
require __DIR__."/materia.php";

use Models\Utils\NotaSQL;
use Model\DataBase\GestorNotasDB;
use Models\Entities\Student;
use Models\Entities\Materia;

class Nota{
    private  $studentCode;
    private $materiaCode;
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
    public function getS()
    {
        $student = new Student();
        $nombreS = $student->getByCode($this->studentCode);
        return $nombreS;
    }
    public function getM()
    {
        $materia = new Materia();
        $nombreM = $materia->getByCode($this->materiaCode);
        return $nombreM;
    }
    public function all()
    {
        $sql = NotaSQL::selectAll();
        $db = new GestorNotasDB();
        $db->setIsSqlSelect(true);
        $result = $db->execSQL($sql);
        $rows = [];
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $nota = new Nota();
                $nota->set('studentCode', $item['estudiante']);
                $nota->set('materiaCode', $item['materia']);
                $nota->set('actividad', $item['actividad']);
                $nota->set('nota', $item['nota']);
                array_push($rows, $nota);
            }
        }
        return $rows;
    }
    public function save()
    {
        $sql = NotaSQL::insertInto();
        $db = new GestorNotasDB();
        $result = $db->execSQL(
            $sql,
            "iisi",
            $this->materiaCode,
            $this->studentCode,
            $this->actividad,
            $this->nota
        );
        return $result;
    }
    
}

?>