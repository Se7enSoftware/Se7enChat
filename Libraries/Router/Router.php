<?php
namespace Se7enChat\Libraries\Router;

class Router
{
    private $routes;
    private $dependencies = array();
    private $didRoute;

    public function __construct($routes)
    {
        $this->routes = $routes;
        $this->routeKeys = array_keys($this->routes);
    }

    public function setDependencies(array $classMap)
    {
        $this->dependencies = $classMap;
    }

    public function route(array $request)
    {
        foreach ($request as $requestKey => $requestValue) {
            if (in_array($requestKey, $this->routeKeys)) {
                $this->routeRequest($this->routes[$requestKey][$requestValue]);
            }
        }
        if (in_array('default', $this->routeKeys) && !$this->didRoute) {
            $this->routeRequest($this->routes['default']);
        }
    }

    private function routeRequest($route)
    {
        $pieces = explode($this->getMethodType($route), $route);
        $this->callMethod($pieces[0], $pieces[1]);
        $this->didRoute = true;
    }

    private function callMethod($class, $method)
    {
        $reflectedObject = new \ReflectionClass($class);
        $objectInstance = $reflectedObject->newInstanceArgs(
            $this->resolveClassDependencies($class));
        call_user_func(array($objectInstance, $method));
    }

    private function resolveClassDependencies($class)
    {
        $dependencies = $this->mapDependencies(
            $this->getConstructorParameters($class));
        $requiredObjects = array();
        foreach($dependencies as $object) {
            $requiredObjects[] = new $object;
        }
        return $requiredObjects;
    }

    private function mapDependencies(array $constructorDependencies)
    {
        for ($i = 0; $i < count($constructorDependencies); ++$i) {
            $className = $constructorDependencies[$i]->getClass()->name;
            if (array_key_exists($className, $this->dependencies)) {
                $constructorDependencies[$i] = $this->dependencies[$className];
            } else {
                $constructorDependencies[$i] = $className;
            }
        }
        return $constructorDependencies;
    }

    private function getConstructorParameters($class)
    {
        $reflectionClass = new \ReflectionClass($class);
        $constructor = $reflectionClass->getConstructor();
        if ($constructor === null) {
            return array();
        }
        return $constructor->getParameters();
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
