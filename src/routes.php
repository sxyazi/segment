<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes


// 登录
$app->get('/login', 'App\Controllers\UserController:login')->setName('login');
$app->get('/logout', 'App\Controllers\UserController:logout')->setName('logout');
$app->post('/login', 'App\Controllers\UserController:login');


// 注册
$app->get('/register', 'App\Controllers\UserController:register')->setName('register');
$app->post('/register', 'App\Controllers\UserController:register');


$app->group('', function () {

    // 首页
    $this->get('/', 'App\Controllers\HomeController:index')->setName('home');

})->add(new \App\Middleware\mustLogin($app->getContainer()->router));


// 卡片
$app->group('/cards', function () {

    $this->get('', 'App\Controllers\CardController:index')->setName('cards.index');
    $this->post('', 'App\Controllers\CardController:store')->setName('cards.store');
    $this->put('', 'App\Controllers\CardController:update')->setName('cards.update');
    $this->delete('', 'App\Controllers\CardController:destroy')->setName('cards.destroy');

    $this->get('/{id}/items', 'App\Controllers\ItemController:index')->setName('items.index');
    $this->post('/{id}/items', 'App\Controllers\ItemController:store')->setName('items.store');
    $this->put('/{id}/items', 'App\Controllers\ItemController:update')->setName('items.update');
    $this->delete('/{id}/items', 'App\Controllers\ItemController:destroy')->setName('items.destroy');

})->add(new \App\Middleware\mustLogin($app->getContainer()->router));

