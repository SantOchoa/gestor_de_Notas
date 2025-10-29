<?php

namespace Controllers;

require __DIR__ . "/../models/entities/user.php";
require __DIR__ . "/session-controller.php";
use Controllers\SessionController;
use Models\Entities\User;

class UsersController
{

    public function validarUsuario($request)
    {
        if (empty($request['user']) || empty($request['pwd'])) {
            return null;
        }
        $user = new User();
        $user->set('userName', $request['user']);
        $user->set('password', $request['pwd']);
        $userValidate = $user->find();
        if (!empty($userValidate)) {
            // session_start();
            // $_SESSION['user'] = $user->get('id');
            // $_SESSION['username'] = $user->get('userName');
            $sessionController = new SessionController();
            $sessionController->create($userValidate);
        }
        return $userValidate;
    }

    public function getUsers()
    {
        $user = new User();
        return $user->all();
    }

    public function saveNewUser($request)
    {
        if (empty($request['user']) || empty($request['pwd'])) {
            return false;
        }
        $user = new User();
        $user->set('userName', $request['user']);
        $user->set('password', $request['pwd']);
        return $user->save();
    }

    public function updateUser($request)
    {
        if (
            empty($request['id'])
            || empty($request['user'])
            || empty($request['pwd'])
        ) {
            return false;
        }
        $user = new User();
        $user->set('userName', $request['user']);
        $user->set('password', $request['pwd']);
        $user->set('id', $request['id']);
        return $user->update();
    }

    public function deleteUser($request)
    {
        if (empty($request['id'])) {
            return false;
        }
        $user = new User();
        $user->set('id', $request['id']);
        return $user->delete();
    }
}
