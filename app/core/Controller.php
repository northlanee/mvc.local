<?php

namespace app\core;

use app\core\View;
use app\core\Db;

abstract class Controller
{

    public $route; // массив из названия контроллера и єкшна для доступа внутри любого из контроллеров
    public $view;

    public $db;

    public function __construct($route)
    {

        $this->route = $route; // присвоение значения роута, переданного при візове контроллера в маршрутизаторе
        $this->view = new View($route);
        $this->db = new Db();

    }

}