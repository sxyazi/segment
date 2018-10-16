<?php

namespace App\Controllers;

use Slim\Container;

class  Controller
{
    protected $c = null;

    public function __construct(Container $c)
    {
        $this->c = $c;
    }

    public function __get($name)
    {
        if ($this->c->has($name)) {
            return $this->c->get($name);
        }
    }
}
