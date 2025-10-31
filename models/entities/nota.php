<?php
namespace Models\Entities;


require_once __DIR__."/../utils/notasql.php";
require_once __DIR__."/student.php";
require_once __DIR__."/materia.php";

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
        $nombreS = $student->getNameByCode($this->studentCode);
        return $nombreS;
    }
    public function getM()
    {
        $materia = new Materia();
        $nombreM = $materia->getNameByCode($this->materiaCode);
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

    public function update()
    {
        $sql = NotaSQL::update();
        $db = new GestorNotasDB();
        $result = $db->execSQL(
            $sql,
            "iis",
            $this->nota,
            $this->studentCode,
            $this->actividad
        );
        return $result;
    }
    public function delete()
    {
        $sql = NotaSQL::delete();
        $db = new GestorNotasDB();
        $result = $db->execSQL(
            $sql,
            "i",
            $this->studentCode
        );
        return $result;
    }

    public function getPromedioByStudent()
    {
        $sql = NotaSQL::getPromedioByStudent();
        $db = new GestorNotasDB();
        $db->setIsSqlSelect(true);
        $result = $db->execSQL(
            $sql,
            "ii",
            $this->studentCode,
            $this->materiaCode
        );
        $promedio = null;
        if ($result->num_rows > 0) {
            $promedio = $result->fetch_assoc();
        }
        return $promedio ? number_format($promedio['promedio'], 2) : null;
    }
    public function allByMateria($materia_codigo)
    {
        $sql = Notasql::selectAllByMateria();
        $db = new GestorNotasDB(); 
        $db->setIsSqlSelect(true);
        
        $result = $db->execSQL(
            $sql, 
            "i", 
            $materia_codigo
        ); 
        
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
}

?>