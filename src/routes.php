<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', 'App\Controllers\HomeController:index');

// 登录
$app->get('/login', 'App\Controllers\UserController:login')->setName('login');
$app->post('/login', 'App\Controllers\UserController:login');

// 首页
$app->get('/home', 'App\Controllers\HomeController:index')->setName('home');


//
//$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
//    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
//});
