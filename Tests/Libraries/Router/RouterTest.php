<?php
namespace Se7enChat\Tests\Libraries\Router;
use Se7enChat\Libraries\Router\Router;

class RouterTest extends \PHPUnit_Framework_TestCase
{
    private $routes;
    private $router;

    public function __construct()
    {
        // In most cases this would probably be given parsed yaml.
        $this->routes = array(
            'default' => 'Se7enChat\Tests\Libraries\Router\TestAction->main',
            'action' => array(
                'test' => 'Se7enChat\Tests\Libraries\Router\TestAction->main',
                'staticTest' => 'Se7enChat\Tests\Libraries\Router\TestAction::staticMain',
                'dependencyTest' => 'Se7enChat\Tests\Libraries\Router\TestActionWithDependency->main',
                'abstractDependencyTest' => 'Se7enChat\Tests\Libraries\Router\TestActionWithAbstractDependency->main'
            )
        );
    }

    public function setUp()
    {
        $this->router = new Router($this->routes);
    }

    public function tearDown()
    {
        unset($this->router);
        TestAction::$mainWasCalled = false;
        TestAction::$staticMainWasCalled = false;
    }

    public function testDoesCallInstanceMethods()
    {
        $this->router->route(array('action' => 'test'));
        $this->assertTrue(TestAction::$mainWasCalled);
    }

    public function testDoesCallStaticMethods()
    {
        $this->router->route(array('action' => 'staticTest'));
        $this->assertTrue(TestAction::$staticMainWasCalled);
    }

    public function testDoesRouteToDefaultMethod()
    {
        $this->router->route(array());
        $this->assertTrue(TestAction::$mainWasCalled);
    }

    public function testDoesResolveConcreteClassDependencies()
    {
        $this->router->route(array(
            'action' => 'dependencyTest'
        ));
        $this->assertInstanceOf(
            'Se7enChat\Tests\Libraries\Router\RouterDependency',
            TestActionWithDependency::$dependency
        );
        $this->assertInstanceOf(
            'Se7enChat\Tests\Libraries\Router\RouterDependency',
            TestActionWithDependency::$secondDependency
        );
    }

    public function testDoesResolveAbstractClassDependencies()
    {
        $this->router->setDependencies(array(
            'Se7enChat\Tests\Libraries\Router\AbstractRouterDependency' => 'Se7enChat\Tests\Libraries\Router\ConcreteRouterDependency')
        );
        $this->router->route(array(
            'action' => 'abstractDependencyTest'
        ));
        $this->assertInstanceOf(
            'Se7enChat\Tests\Libraries\Router\AbstractRouterDependency',
            TestActionWithAbstractDependency::$abstractDependency
        );
    }
}
