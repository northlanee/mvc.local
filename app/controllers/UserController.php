<?php

namespace app\controllers;

use app\controllers\MainController;

class UserController extends MainController
{

    public function loginAction () {

        $this->view->render('Login');

    }

    public function registerAction () {

        $this->view->render('Register');

    }

}