<?php

use Respect\Validation\Validator as V;

// Register validator
V::with('App\\Validation\\Rules\\');

// Service factory for the ORM
$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);

$capsule->setAsGlobal();
$capsule->bootEloquent();

unset($capsule);
