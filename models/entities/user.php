<?php

namespace Models\Entities;

require __DIR__ . '/../utils/user-sql.php';
require __DIR__ . '/../database/gestor_notasdb.php';

use Models\Utils\UserSQL;
use Model\DataBase\GestorNotasDB;


class User
{
    private $id;
    private $userName;
    private $password;

    public function set($prop, $val)
    {
        $this->{$prop} = $val;
    }
    public function get($prop)
    {
        return $this->{$prop};
    }

    public function all()
    {
        $sql = UserSQL::selectAll();
        $db = new GestorNotasDB();
        $db->setIsSqlSelect(true);
        $result = $db->execSQL($sql);
        $rows = [];
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $user = new User();
                $user->set('id', $item['id']);
                $user->set('userName', $item['userName']);
                array_push($rows, $user);
            }
        }
        return $rows;
    }

    public function find()
    {
        $sql = UserSQL::selectByUserPwd();
        $db = new GestorNotasDB();
        $db->setIsSqlSelect(true);
        $result = $db->execSQL(
            $sql,
            "ss",
            $this->userName,
            $this->password
        );
        $user = null;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new User();
                $user->id = $row["id"];
                $user->userName = $row["userName"];
                $user->password = $row["password"];
                break;
            }
        }
        return $user;
    }

    public function save()
    {
        $sql = UserSQL::insertInto();
        $db = new GestorNotasDB();
        $result = $db->execSQL($sql, "ss", $this->userName, $this->password);
        return $result;
    }

    public function update()
    {
        $sql = UserSQL::update();
        $db = new GestorNotasDB();
        $result = $db->execSQL(
            $sql,
            "ssi",
            $this->userName,
            $this->password,
            $this->id
        );
        return $result;
    }

    public function delete()
    {
        $sql = UserSQL::delete();
        $db = new GestorNotasDB();
        $result = $db->execSQL(
            $sql,
            "i",
            $this->id
        );
        return $result;
    }
}