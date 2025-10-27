<?php

namespace Controllers;

require __DIR__ . "/../models/entities/student.php";
require __DIR__ . "/session-controller.php";

use Controllers\SessionController;
use Models\Entities\Student;
class StudentController
{
    public function validarUsuario($request)
    {
        if (empty($request['userName']) || empty($request['userCode'])) {
            return null;
        }
        $student = new Student();
        $student->set('nombre', $request['userName']);
        $student->set('codigo', $request['userCode']);
        $studentValidate = $student->find();
        if (!empty($studentValidate)) {
            $sessionController = new SessionController();
            $sessionController->create($studentValidate);
        }
        return $studentValidate;
    }
}