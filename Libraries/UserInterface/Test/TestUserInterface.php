<?php
namespace Se7enChat\Libraries\UserInterface\Test;
use Se7enChat\Gateways\UserInterfaceGateway;

class TestUserInterface implements UserInterfaceGateway
{
    public static $renderCalled = false;

    public function render($template, array $parameters)
    {
        self::$renderCalled = true;
    }
}
