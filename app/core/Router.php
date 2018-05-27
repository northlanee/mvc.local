<?php

namespace app\core;

class Router
{

    protected $routes = []; // массив, содержащий все маршруты в виде ключей регулярок и значений параметров контроллера и экшена
    protected $params = []; // массив, содержащий название найденного контроллера и экшна

    function __construct()
    {

        $arr = require 'app/config/routes.php';
        foreach ($arr as $key => $value) {

            $this->add($key, $value);

        }

    }

    /*
     * Добавление маршрута в виде регулярки в глобальный массив класса
     */
    public function add ($route, $params) {

        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;

    }

    /*
     * Сравнение маршурута с таблицей маршрутизации
     */
    public function match () {

        $url = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->routes as $route => $params) {

            if (preg_match($route, $url, $matches)) {

                $params = explode('/', $params);
                $this->params = $params;
                return true;
                break;

            }

        }

        return false;

    }

    /*
     * Основная функция, запускаемая из индексного файла
     */
    public function run () {

        if ($this->match()) {

            $path = 'app\controllers\\'.ucfirst($this->params[0]).'Controller';
            $action = $this->params[1].'Action';

            if (class_exists($path)) {

                if (method_exists($path, $action)) {

                    $controller = new $path($this->params);
                    $controller->$action();
                    exit;

                }

            }

        }

        View::errorCode(404);

    }

}