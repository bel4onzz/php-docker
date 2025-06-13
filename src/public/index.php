<?php
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\Controller\ContainerControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\EventDispatcher\EventDispatcher;
use DI\ContainerBuilder;

require_once __DIR__ . '/../vendor/autoload.php';

// Load routes from external file
$routes = require_once __DIR__ . '/../config/routes.php';

// DI Container
$builder = new ContainerBuilder();
$container = $builder->build();

// Symfony Kernel Setup
$request = Request::createFromGlobals();
$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

try {
    $request->attributes->add($matcher->match($request->getPathInfo()));

    // Use ContainerControllerResolver which accepts a PSR-11 container
    $resolver = new ContainerControllerResolver($container);
    $argumentResolver = new ArgumentResolver();
    $dispatcher = new EventDispatcher();

    $kernel = new HttpKernel($dispatcher, $resolver, null, $argumentResolver);
    $response = $kernel->handle($request);
    $response->send();

} catch (Symfony\Component\Routing\Exception\ResourceNotFoundException $e) {
    (new Response('404 Not Found', 404))->send();
} catch (Exception $e) {
    (new Response('500 Internal Server Error: ' . $e->getMessage(), 500))->send();
}

