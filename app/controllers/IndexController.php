<?php

namespace app\controllers;

use app\controllers\MainController;

class IndexController extends MainController
{

    public function indexAction () {

        $this->model['news'] = $this->loadModel('news');

        $news = $this->model['news']->getAllNews();

        //$this->view->path = 'test/test';
        $this->view->render('Главная страница', compact('news'));

    }

}