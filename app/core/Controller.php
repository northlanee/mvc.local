<?php

namespace app\core;

use app\core\View;

abstract class Controller
{

    public $route; // массив из названия контроллера и єкшна для доступа внутри любого из контроллеров
    public $view;

    public function __construct($route)
    {

        $this->route = $route; // присвоение значения роута, переданного при візове контроллера в маршрутизаторе
        $this->view = new View($route);

    }

}