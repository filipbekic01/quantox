<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$index = new RouteCollection();
$index->add('', new Route('/students/{id}', [
    '_controller' => '\School\Controller\SchoolController::index'
]));
// $index->setMethods(['POST']);

$routes->addCollection($index);

return $routes;
