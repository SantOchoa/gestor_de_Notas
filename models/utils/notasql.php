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
        return "update notas set nota=? where estudiante=? and actividad=?";
    }
    public static function delete(){
        return "delete from notas where estudiante=?";
    }
    public static function getPromedioByStudent(){
        return "select AVG(nota) as promedio from notas WHERE estudiante=? and materia=?";
    }
    public static function selectAllByMateria(){
        return "select * from notas where materia = ?";
    }
    public static function selectAllByStudent(){
        return "select * from notas where estudiante = ?";
    }
    public static function selectAllByMateriaStudent(){
        return "select * from notas where estudiante = ? and materia = ?";
    }
}   

?>