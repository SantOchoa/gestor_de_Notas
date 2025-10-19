<?php
namespace Models\Utils;

require __DIR__."/modelsql.php";

use Models\Utils\Modelsql;

class Materiasql extends Modelsql{
    public static function selectAll(){
        return "select * from materias";
    }
    public static function insertInto(){
        return "insert into materias (codigo,nombre,programa) values(?,?,?)";
    }
    public static function update(){
        return "update materias set nombre=?, programa=? where codigo=?";
    }
    public static function delete(){
        return "delete form materias where codigo=?";
    }
}
?>
