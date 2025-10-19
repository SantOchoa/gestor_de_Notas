<?php
namespace Models\Utils;

abstract class Modelsql{

    abstract public static function selectAll();
    abstract public static function insertInto();
    abstract public static function update();
    abstract public static function delete();

}

?>