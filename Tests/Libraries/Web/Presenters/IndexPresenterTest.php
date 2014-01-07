<?php
namespace Se7enChat\Tests\Libraries\Web\Presenters;
use Se7enChat\Libraries\Web\Presenters\IndexPresenter;
use Se7enChat\Tests\Helpers\Mocks\MockUserInterface;

class IndexPresenterTest extends \PHPUnit_Framework_TestCase
{
    private $presenter;

    public function setUp()
    {
        $this->presenter = new IndexPresenter(
            new MockUserInterface);
    }

    public function tearDown()
    {
        unset($this->presenter);
    }

    public function testCallsRenderOnUserInterface()
    {
        $this->presenter->render(array());
        $this->assertTrue(MockUserInterface::$renderCalled);
    }
}
