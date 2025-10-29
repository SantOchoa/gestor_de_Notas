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
        
        $student = new Student();
        $student->set('codigo', $request['codigoStudent']);
        $student->set('nombre', $request['nombreStudent']);
        $student->set('email', $request['emailStudent']);
        $student->set('programaCode', $request['programaSelect']);
        return $student->save();
    }

    public function updateStudent($request)
    {
        $student = new Student();
        $student = new Student();
        $student->set('codigo', $request['codigoStudent']);
        $student->set('nombre', $request['nombreStudent']);
        $student->set('email', $request['emailStudent']);
        $student->set('programaCode', $request['programaSelect']);
        return $student->update();
    }

    public function deleteStudent($request)
    {

        $student = new Student();
        $student->set('codigo', $request['codigoStudent']);
        return $student->delete();
    }
}