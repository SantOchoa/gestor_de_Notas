<?php
namespace Models\Utils;



class Studentsql{
    public static function selectAll(){
        return "select * from estudiantes";
    }
    public static function insertInto(){
        return "insert into estudiantes (codigo,nombre,email,programa)values(?,?,?,?)";
    }
    public static function selectByCode()
    {
        return "select * from estudiantes where codigo=?";
    }
    public static function selectByName()
    {
        return "select * from estudiantes where nombre=?";
    }
    public static function update(){
        return "update estudiantes set nombre=?, email=?, programa=? where codigo=?";
    }
    public static function delete(){
        return "delete from estudiantes where codigo=?";
    }

}
?>