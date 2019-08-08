<?php

namespace app\core;

/**
 * Class DataBase
 * @package app\core
 * Singleton Pattern
 */
class DataBase
{

    private static $instance;
    private static $config;

    private function __construct()
    {
        if(file_exists(CONFIG_PATH . 'db.php')) {
            self::$config =  require_once CONFIG_PATH . 'db.php';
        }
    }

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function connect()
    {
        $connect = null;

        try {
            $connect = new \PDO(
                "mysql:host=" . self::$config['host'] . ";dbname=" . self::$config['dbName'],
                self::$config['username'],
                self::$config['password'],
                [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
            );

            $connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $connect;

        } catch (PDOException $e) {

            throw $e;

        }
        catch(Exception $e) {

            throw $e;

        }
    }

    private function __clone() {}
    public function __wakeup() {}

}