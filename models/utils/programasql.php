<?php

namespace Models\Utils;


class Programasql{
    public static function selectAll(){
        return "select * from programas";
    }
    public static function selectByCode(){
        return "select * from programas where codigo=?";
    }
    public static function insertInto(){
        return "insert into programas (codigo,nombre)values(?,?)";
    }
    public static function update(){
        return "update programas set nombre=? where codigo=?";
    }
    public static function delete(){
        return "delete form programas where codigo=?";
    }
}
?>