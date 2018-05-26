<?php

namespace app\core;

abstract class Controller
{

    public $route; // массив из названия контроллера и єкшна для доступа внутри любого из контроллеров

    public function __construct($route)
    {

        $this->route = $route; // присвоение значения роута, переданного при візове контроллера в маршрутизаторе

    }

}