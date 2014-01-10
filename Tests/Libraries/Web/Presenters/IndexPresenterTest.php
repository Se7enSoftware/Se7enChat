<?php
namespace Se7enChat\Tests\Libraries\Web\Presenters;
use Se7enChat\Libraries\UserInterface\Test\TestUserInterface;

class IndexPresenterTest extends \PHPUnit_Framework_TestCase
{
    private $presenter;

    public function testCallsRenderMethod()
    {
        $presenter = $this->getMock(
            '\Se7enChat\Libraries\Web\Presenters\IndexPresenter',
            array('compileCss'),
            array(new TestUserInterface)
        );
        $presenter->present(array());
        $this->assertTrue(TestUserInterface::$renderCalled);
    }
}
