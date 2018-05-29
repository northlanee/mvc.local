<?php

namespace app\core;

use app\core\View;
use app\core\Db;

abstract class Controller
{

    public $route; // массив из названия контроллера и єкшна для доступа внутри любого из контроллеров
    public $view;
    public $model = [];
    public $acl;

    public function __construct($route)
    {

        $this->route = $route; // присвоение значения роута, переданного при візове контроллера в маршрутизаторе
        if (!$this->checkAcl()) {
            View::errorCode(403);
        }
        $this->view = new View($route);

    }

    public function loadModel($name) {

        $path = 'app\models\\'.ucfirst($name);

        if (class_exists($path)) {

            return new $path();

        }

    }

    public function checkAcl() {

        $this->acl = require 'app/acl/'.$this->route[0].'.php';
        if ($this->isAcl('all')) {
            return true;
        }
        elseif (isset($_SESSION['authorized']['id']) && $this->isAcl('authorize')) {
            return true;
        }
        elseif (!isset($_SESSION['authorized']['id']) && $this->isAcl('guest')) {
            return true;
        }
        elseif (isset($_SESSION['admin']) && $this->isAcl('admin')) {
            return true;
        }
        else return false;

    }

    public function isAcl($key) {

        return in_array($this->route[1], $this->acl[$key]);

    }

}