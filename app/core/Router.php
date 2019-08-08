<?php

namespace app\core;

class Router
{
    private $routes;

    public function __construct()
    {
        $file = CONFIG_PATH . 'routs.php';
        try {
            if (file_exists($file)) {
                $this->routes = include($file);
            } else {
                throw new \Exception('Error! File not found' .  $file);
            }
        } catch (\Exception $mess) {
            $mess->getMessage();
            die();
        }
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            if ($_SERVER['REQUEST_URI'] == '/') {
                header('Location: /tasks');
            }
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $url = $this->getURI();
        $errorCounter  = null;

        foreach ($this->routes as $urlPatten => $path) {
            if (preg_match("~$urlPatten~", $url)) {

                $internalRoute = preg_replace("~$urlPatten~", $path, $url);

                $segments = explode('/', $internalRoute);
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));
                $parameters = $segments;

                $classObj = "app\\controllers\\" . $controllerName;
                $controllerObj = new $classObj();

                $res = call_user_func_array([$controllerObj, $actionName], $parameters);

                if ($res != null) {
                    break;
                }
            } else {
                $errorCounter++;
            }
        }

        if ($errorCounter !== null) {
            require_once VIEW_PATH . 'erorrs/404.php';
        }
    }
}
