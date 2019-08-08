<?php
use app\core\AutoLoader;
use app\core\Router;

require_once(CORE_PATH . 'AutoLoader.php');

session_start();

AutoLoader::load();

$router = new Router();
$router->run();