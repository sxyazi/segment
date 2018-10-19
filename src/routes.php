<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', 'App\Controllers\HomeController:index');

// 登录
$app->get('/login', 'App\Controllers\UserController:login')->setName('login');
$app->post('/login', 'App\Controllers\UserController:login');

// 卡片
$app->group('/cards', function () {

    $this->get('', 'App\Controllers\CardController:index')->setName('cards.index');
    $this->get('/{id}', 'App\Controllers\CardController:show')->setName('cards.show');

})->add(new \App\Middleware\mustLogin($app->getContainer()->router));

//
//$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
//    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
//});
