<?php
namespace Se7enChat\Tests\Libraries\Router;

class TestActionWithDependency
{
    public static $dependency = null;
    public static $secondDependency = null;

    public function __construct(RouterDependency $dependency, RouterDependency $dependency2)
    {
        self::$dependency = $dependency;
        self::$secondDependency = $dependency2;
    }

    public function main()
    {}
}
