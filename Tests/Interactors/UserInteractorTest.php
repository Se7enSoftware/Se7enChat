<?php
namespace Se7enChat\Tests\Interactors;
use Se7enChat\Interactors\UserDataInteractor;
use Se7enChat\Libraries\Database\Test\UserData;

class UserDataInteractorTest extends \PHPUnit_Framework_TestCase
{
    private $interactor;

    public function setUp()
    {
        $this->interactor = new UserDataInteractor(
            new UserData());
    }

    public function tearDown()
    {
        unset($this->interactor);
    }

    public function testDoesConstructUserFromId()
    {
        $this->assertInstanceOf(
            '\Se7enChat\Entities\User',
            $this->interactor->getUserFromId(1)
        );
    }
}
