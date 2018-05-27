<?php

namespace app\controllers;

use app\controllers\MainController;

class IndexController extends MainController
{

    public function indexAction () {

        $name = 'some name';
        $text = 'some text';

        //$this->view->path = 'test/test';
        $this->view->render('Главная страница', compact('name', 'text'));

    }

}