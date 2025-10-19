<?php
namespace Models\Utils;

require __DIR__."/modelsql.php";

use Models\Utils\Modelsql;

class Programasql extends Modelsql{
    public static function selectAll(){
        return "select * from programas";
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