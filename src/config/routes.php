<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('users-get', 
    (new Route('/'))
        ->setDefault('_controller', 'App\\Controllers\\WelcomeController::index')
        ->setMethods(['GET', 'HEAD'])
);

return $routes;