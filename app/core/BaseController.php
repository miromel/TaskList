<?php

namespace app\core;

/**
 * Class BaseController
 * @package app\core
 */
class BaseController
{
    /**
     * @param $file
     * @param array $params
     * Rendering files with parameter passing
     */
    protected function render($file, $params = [])
    {
        ob_start();
        extract($params, EXTR_SKIP);
        include_once(VIEW_PATH . $file . '.php');
        die();
    }

    /**
     * Check for access to the user
     */
    protected function accessUser()
    {
        if (!isset($_SESSION['signinUser'])) {
            header('Location: /');
        }
    }
}
