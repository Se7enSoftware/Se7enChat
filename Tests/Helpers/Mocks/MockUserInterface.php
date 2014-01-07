<?php
namespace Se7enChat\Tests\Helpers\Mocks;
use Se7enChat\Gateways\UserInterfaceGateway;

class MockUserInterface implements UserInterfaceGateway
{
    public static $renderCalled = false;

    public function render(array $info)
    {
        self::$renderCalled = true;
    }
}
