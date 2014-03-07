<?php
namespace Se7enChat\Tests\Libraries\Web\Controllers;
use Se7enChat\Libraries\Web\Controllers\IndexController;
use Se7enChat\Libraries\Web\Presenters\IndexPresenter;

class IndexControllerTest extends \PHPUnit_Framework_TestCase
{
    private $interactor;
    private $controller;

    public function setUp()
    {
        $this->interactor = $this->getMock(
            '\Se7enChat\Interactors\IndexInteractor');
        $this->controller = new IndexController(
            $this->interactor);
    }

    public function tearDown()
    {
        unset($this->controller);
    }

    public function testCallsIndexInteractorMainMethod()
    {
        $this->interactor->expects($this->once())
            ->method('main');
        $this->controller->main();
    }
}

