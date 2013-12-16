<?php
namespace Se7enChat\tests\src\router;
use Se7enChat\src\router\Router;
use Se7enChat\tests\actions\TestAction;

class RouterTest extends \PHPUnit_Framework_TestCase
{
    private $routes;
    private $router;

    public function __construct()
    {
        // In most cases this would probably be given parsed yaml.
        $this->routes = array(
            'action' => array(
                'test' => '\Se7enChat\tests\actions\TestAction->main',
                'staticTest' => '\Se7enChat\tests\actions\TestAction::staticMain'
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
}
