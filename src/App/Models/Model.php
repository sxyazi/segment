<?php

namespace App\Models;

class Model
{
    protected static $db;

    public static function __callStatic($name, $arguments)
    {
        global $app;
        if (!static::$db) {
            static::$db = $app->getContainer()->db->table(static::TABLE);
        }

        if (method_exists(static::$db, $name)) {
            return call_user_func_array([static::$db, $name], $arguments);
        }
    }
}
