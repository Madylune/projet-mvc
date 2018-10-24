<?php
namespace Helper;
// require_once('vendor/autoload.php');
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Controller\RouteController as RouteController;

class RouteHelper
{
    public function route() {
        try {
            // Load routes from the yaml file
            $fileLocator = new FileLocator(array(__DIR__));
            $loader = new YamlFileLoader($fileLocator);
            $routes = $loader->load('../config/routes.yaml');
        
            // Init RequestContext object
            $context = new RequestContext();
            $context->fromRequest(Request::createFromGlobals());
        
            // Init UrlMatcher object
            $matcher = new UrlMatcher($routes, $context);
        
            // Find the current route
            $parameters = $matcher->match($context->getPathInfo());
        
            // Output the correct view
            $controller = $parameters['controller'];
            $route = new RouteController;
    
            if ($parameters['_route'] === 'employees_placeholder') {
                $id = $parameters['id'];
                $route->$controller($id);
            } else {
                $route->$controller();
            }

            exit;
        }
        catch (ResourceNotFoundException $e) {
            echo $e->getMessage();
        }
    }
}