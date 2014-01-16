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
            'action' => array(
                'test' => '\Se7enChat\Tests\Libraries\Router\TestAction->main',
                'staticTest' => '\Se7enChat\Tests\Libraries\Router\TestAction::staticMain'
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

    public function testRouterCanCallInstanceMethods()
    {
        $this->router->route(array('action' => 'test'));
        $this->assertTrue(TestAction::$mainWasCalled);
    }

    public function testRouterCanCallStaticMethods()
    {
        $this->router->route(array('action' => 'staticTest'));
        $this->assertTrue(TestAction::$staticMainWasCalled);
    }

    public function testRouterCanRouteToDefaultMethod()
    {
        $router = new Router(array(
            'default' => '\Se7enChat\Tests\Libraries\Router\TestAction->main'));
        $router->route(array());
        $this->assertTrue(TestAction::$mainWasCalled);
    }
}
