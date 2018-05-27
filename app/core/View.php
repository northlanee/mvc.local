<?php

namespace app\core;

class View
{

    public $path; // Переменная, содержащая путь вида в папке views. Можно изменять в контроллерах, по умолчанию контроллер/єкшн
    public $route; // Массив, содержащий название контроллера и єкшна текущей страниці
    public $layout = 'default'; // Переменная, содержащая название шаблона. Можно изменять в контроллерах

    public function __construct($route)
    {

        $this->route = $route;
        $this->path = $route[0].'/'.$route[1];

    }

    public function render($title, $vars = []) {

        extract($vars);
        if (file_exists('app/views/'.$this->path.'.php')) {

            ob_start();
            require 'app/views/'.$this->path.'.php';
            $content = ob_get_clean();
            require 'app/views/layouts/'.$this->layout.'.php';

        } else {

            View::errorCode(404);

        }

    }

    public static function errorCode ($code) {

        http_response_code($code);
        require 'app/views/errors/'.$code.'.php';
        exit;

    }

    public function redirect ($url) {

        header('Location: '.$url);
        exit;

    }

}