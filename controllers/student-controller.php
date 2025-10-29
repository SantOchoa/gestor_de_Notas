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
        $student = new Student();
        return $student->all();
    }

    public function saveNewStudent($request)
    {
        if (empty($request['user']) || empty($request['pwd'])) {
            return false;
        }
        $student = new Student();
        $student->set('userName', $request['user']);
        $student->set('password', $request['pwd']);
        return $student->save();
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
        $student = new Student();
        $student->set('userName', $request['user']);
        $student->set('password', $request['pwd']);
        $student->set('id', $request['id']);
        return $student->update();
    }

    public function deleteStudent($request)
    {
        if (empty($request)) {
            return false;
        }
        $student = new Student();
        $student->set('codigo', $request);
        return $student->delete();
    }
}