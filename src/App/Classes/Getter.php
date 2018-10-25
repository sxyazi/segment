<?php

namespace App\Classes;

class Getter
{
    private $value = [];

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __get($name)
    {
        if (!isset($this->value[$name])) {
            return null;
        }

        $ret = $this->value[$name];
        if (is_array($ret) || is_object($ret)) {
            return new self($ret);
        }

        return $ret;
    }
}
