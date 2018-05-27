<?php

namespace app\core;

use app\core\View;
use app\core\Db;

abstract class Controller
{

    public $route; // массив из названия контроллера и єкшна для доступа внутри любого из контроллеров
    public $view;
    public $model;

    public function __construct($route)
    {

        $this->route = $route; // присвоение значения роута, переданного при візове контроллера в маршрутизаторе
        $this->view = new View($route);
        $this->model = $this->loadModel($route[0]);

    }

    public function loadModel($name) {

        $path = 'app\models\\'.ucfirst($name);

        if (class_exists($path)) {

            return new $path();

        }

    }

}