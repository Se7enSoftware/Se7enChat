<?php
namespace Se7enChat\Tests\Libraries\Web\Presenters;
use Se7enChat\Libraries\Web\Presenters\IndexPresenter;
use Se7enChat\Libraries\UserInterface\Test\TestUserInterface;

class IndexPresenterTest extends \PHPUnit_Framework_TestCase
{
    private $presenter;

    public function setUp()
    {
        $this->presenter = new IndexPresenter(
            new TestUserInterface);
    }

    public function tearDown()
    {
        unset($this->presenter);
    }

    public function testCallsRenderMethod()
    {
        $this->presenter->present(array());
        $this->assertTrue(TestUserInterface::$renderCalled);
    }
}
