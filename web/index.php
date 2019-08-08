<?php

/**
 * ERRORS
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);


/**
 * ALIASES
 */
define('APP_PATH', __DIR__ . '/../app/');
define('WEB_PATH', __DIR__ . '/../web/');

define('CONFIG_PATH', APP_PATH . 'config/');
define('CORE_PATH', APP_PATH . 'core/');
define('CONTROLLERS_PATH', APP_PATH . 'controllers/');
define('VIEW_PATH', APP_PATH . 'views/');


/**
 * START APPLICATION
 */
require_once(APP_PATH. 'bootstrap.php');

