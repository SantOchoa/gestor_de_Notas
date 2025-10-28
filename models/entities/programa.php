<?php
namespace Models\Entities;


class Programa{
    private $cod;
    private $name;

    public function set($prop, $val)
    {
        $this->{$prop} = $val;
    }
    public function get($prop)
    {
        return $this->{$prop};
    }
}



?>