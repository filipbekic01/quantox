<?php

ini_set('display_errors', 1);
error_reporting(-1);

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$routes = include __DIR__ . '/../src/routes.php';

global $container;
$container = include __DIR__ . '/../src/container.php';

define('ROOT', __DIR__);

$request = Request::createFromGlobals();

$response = $container->get('framework')->handle($request);

$response->send();
