<?php

namespace Models\Utils;


//Falta la verdadera primary Key para update y delete
class Notasql {
    public static function selectAll(){
        return "select * from notas";
    }
    public static function insertInto(){
        return "insert into notas (materia,estudiante,actividad,nota)values(?,?,?,?)";
    }
    public static function update(){
        return "update notas set nota=? where estudiante=?";
    }
    public static function delete(){
        return "delete form notas where nota=?";
    }
}   

?>