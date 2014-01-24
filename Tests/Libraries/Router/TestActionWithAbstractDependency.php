<?php
namespace Se7enChat\Tests\Libraries\Router;

class TestActionWithAbstractDependency
{
    public static $abstractDependency = null;

    public function __construct(AbstractRouterDependency $dependency)
    {
        self::$abstractDependency = $dependency;
    }

    public function main()
    {}
}
