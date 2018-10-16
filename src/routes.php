<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', 'App\Controllers\HomeController:index');

$app->get('/login', 'App\Controllers\UserController:login');
$app->post('/login', 'App\Controllers\UserController:login');

//
//$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
//    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
//});
