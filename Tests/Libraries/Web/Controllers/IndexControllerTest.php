<?php
namespace Se7enChat\Tests\Libraries\Web\Controllers;
use Se7enChat\Libraries\Web\Controllers\IndexController;
use Se7enChat\Libraries\Web\Presenters\IndexPresenter;
use Se7enChat\Tests\Helpers\Mocks\MockIndexInteractor;
use Se7enChat\Tests\Helpers\Mocks\MockUserInterface;

class IndexControllerTest extends \PHPUnit_Framework_TestCase
{
    private $controller;

    public function setUp()
    {
        $presenter = new IndexPresenter(
            new MockUserInterface);

        $this->controller = new IndexController(
            new MockIndexInteractor, $presenter);
    }

    public function tearDown()
    {
        unset($this->controller);
    }

    public function testCallsIndexInteractor()
    {
        $this->controller->main();
        $this->assertTrue(MockIndexInteractor::$mainWasCalled);
    }
}
