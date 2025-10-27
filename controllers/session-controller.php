<?php
namespace Controllers;

class SessionController
{
    public function __construct()
    {
        session_start();
    }
    
    public function create($student)
    {
        $_SESSION['student'] = $student->get('codigo');
        $_SESSION['studentname'] = $student->get('nombre');
    }

    public function validar($url) {
        if(empty($_SESSION['student'])){
            header("Location: $url");
        }
    }

    public function close() {
        session_unset();
        session_destroy();
    }
}