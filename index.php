<?php

include 'app/core/dev.php';
include 'app/core/autoload.php';

use app\core\Router;

session_start();

$router = new Router();
$router->run();