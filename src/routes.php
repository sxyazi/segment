<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', 'App\Controllers\HomeController:index')->setName('home');

// 登录
$app->get('/login', 'App\Controllers\UserController:login')->setName('login');
$app->post('/login', 'App\Controllers\UserController:login');

// 注册
$app->get('/register', 'App\Controllers\UserController:register')->setName('register');
$app->post('/register', 'App\Controllers\UserController:register');

// 卡片
$app->group('/cards', function () {

    $this->get('', 'App\Controllers\CardController:index')->setName('cards.index');
    $this->post('', 'App\Controllers\CardController:store')->setName('cards.store');
    $this->get('/{id}/items', 'App\Controllers\ItemController:index')->setName('items.index');
    $this->post('/{id}/items', 'App\Controllers\ItemController:store')->setName('items.store');
    $this->put('/{id}/items', 'App\Controllers\ItemController:update')->setName('items.update');
    $this->delete('/{id}/items', 'App\Controllers\ItemController:destroy')->setName('items.destroy');

})->add(new \App\Middleware\mustLogin($app->getContainer()->router));

//
//$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
//    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
//});
