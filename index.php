<?php

require './vendor/autoload.php';

$dispatcher = require 'routes.php';

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);


switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo 'Not found';
        break;

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo 'Method Not Allowed';
        break;

    case FastRoute\Dispatcher::FOUND:
        if(count($routeInfo[1]) == 2) {
            $controller = new $routeInfo[1][0];
            echo $controller->{$routeInfo[1][1]}(...array_values($routeInfo[2]));
        }
        break;
}