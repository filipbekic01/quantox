<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('', new Route('/', [
    '_controller' => '\School\Controller\StudentController::index'
]));

$routes->add('student', new Route('/students/{id}', [
    '_controller' => '\School\Controller\StudentController::get'
]));

return $routes;
