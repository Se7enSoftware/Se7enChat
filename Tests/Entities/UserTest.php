<?php
namespace Se7enChat\tests\users;
use Se7enChat\tests\helpers\UserHelper;

class UserTest extends \PHPUnit_Framework_TestCase
{
    private $user;

    public function setUp()
    {
        $this->user = UserHelper::createUserObject();
    }

    public function tearDown()
    {
        unset($this->user);
    }

    public function testCanGetName()
    {
        $this->assertNotEmpty($this->user->getName());
    }

    public function testCanGetEmail()
    {
        $this->assertNotEmpty($this->user->getEmail());
    }

    public function testCanGetAvatarUrl()
    {
        $avatar = $this->user->getAvatar();
        $this->assertTrue(
            $avatar === null || !empty($avatar)
        );
    }
}
