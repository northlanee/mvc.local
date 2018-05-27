<?php

namespace app\controllers;

use app\controllers\MainController;

class IndexController extends MainController
{

    public function indexAction () {

        $news = $this->model->getAllNews();

        //$this->view->path = 'test/test';
        $this->view->render('Главная страница', compact('news'));

    }

}