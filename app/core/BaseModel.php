<?php

namespace app\core;

/**
 * Class BaseModel
 * @package app\core
 */
class BaseModel
{
    /**
     * @var
     */
    private static $db;

    /**
     * Connecting to the database means PDO
     * @return null|\PDO
     */
    public static function dbConnect()
    {
        $dbObj = DataBase::getInstance();
        self::$db = $dbObj::connect();
        return self::$db;
    }
}