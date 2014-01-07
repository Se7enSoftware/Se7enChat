<?php
namespace Se7enChat\Libraries\Router;

class Router
{
    private $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;
        $this->routeKeys = array_keys($this->routes);
    }

    public function route(array $request)
    {
        if (in_array('default', $this->routeKeys) && count($request) == 1) {
            $this->routeRequest($this->routes['default']);
        }
        foreach ($request as $requestKey => $requestValue) {
            if (in_array($requestKey, $this->routeKeys)) {
                $this->routeRequest($this->routes[$requestKey][$requestValue]);
            }
        }
    }

    private function routeRequest($route)
    {
        $pieces = explode($this->getMethodType($route), $route);
        if ($this->methodIsStatic($route)) {
            $executable = sprintf('%s::%s', $pieces[0], $pieces[1]);
        } else {
            $executable = array(new $pieces[0], $pieces[1]);
        }
        call_user_func($executable);
    }

    private function getMethodType($route)
    {
        return $this->methodIsStatic($route) ? '::' : '->';
    }

    private function methodIsStatic($route)
    {
        // If the string contains '::' return true.
        return strpos($route, '::') !== false;
    }
}
