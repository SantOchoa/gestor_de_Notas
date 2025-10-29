<?php

namespace Models\Utils;

class UserSQL
{

    public static function selectAll()
    {
        return "select * from users";
    }

    public static function selectByUserPwd()
    {
        return "select * from users where userName=? and password=?";
    }

    public static function insertInto()
    {
        return "insert into users (userName, password)values(?,?)";
    }

    public static function update()
    {
        $sql = "update users set ";
        $sql .= "userName=?,";
        $sql .= "password=? where id=?";
        return $sql;
    }

    public static function delete(){
        return "delete from users where id=?";
    }
}