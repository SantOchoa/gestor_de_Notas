<?php

namespace Controllers;

require __DIR__ . "/../models/entities/student.php";
require __DIR__ . "/session-controller.php";
use Controllers\SessionController;
use Models\Entities\Student;

class StudentController
{


    public function getStudent()
    {
        $user = new Student();
        return $user->all();
    }

    public function saveNewStudent($request)
    {
        if (empty($request['user']) || empty($request['pwd'])) {
            return false;
        }
        $user = new Student();
        $user->set('userName', $request['user']);
        $user->set('password', $request['pwd']);
        return $user->save();
    }

    public function updateStudent($request)
    {
        if (
            empty($request['id'])
            || empty($request['user'])
            || empty($request['pwd'])
        ) {
            return false;
        }
        $user = new Student();
        $user->set('userName', $request['user']);
        $user->set('password', $request['pwd']);
        $user->set('id', $request['id']);
        return $user->update();
    }

    public function deleteStudent($request)
    {
        if (empty($request['id'])) {
            return false;
        }
        $user = new Student();
        $user->set('id', $request['id']);
        return $user->delete();
    }
}