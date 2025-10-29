<?php
namespace Models\Utils;

require __DIR__."/modelsql.php";

use Models\Utils\Modelsql;

class Studentsql{
    public static function selectAll(){
        return "select * from estudiantes";
    }
    public static function insertInto(){
        return "insert into estudiantes (codigo,nombre,email,programa)values(?,?,?,?)";
    }
    public static function selectByUserCod()
    {
        return "select * from estudiantes where nombre=? and codigo=?";
    }
    public static function update(){
        return "update estudiantes set nombre=?, email=?, programa=? where codigo=?";
    }
    public static function delete(){
        return "delete form estudiantes where codigo=?";
    }

}
?>