<?php

namespace App\Traits;

trait Hash
{
    public static function make($value, $salt = '')
    {
        return sha1(sha1($value) . $salt);
    }

    public static function check($value, $hashedValue, $salt = '')
    {
        return self::make($value, $salt) == $hashedValue;
    }
}
