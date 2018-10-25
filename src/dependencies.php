<?php
// DIC configuration

$container = $app->getContainer();


// twig-view
$container['view'] = function ($c) {
    $settings = $c->get('settings')['view'];

    $view = new Slim\Views\Twig($settings['template_path'], [
        'cache' => $settings['cache_path']
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $c->get('request')->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $basePath));

    return $view;
};

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['validator'] = function () {
    return new Awurth\SlimValidation\Validator();
};

$container['config'] = function ($c) {
    return new \App\Classes\Getter($c->get('settings'));
};
