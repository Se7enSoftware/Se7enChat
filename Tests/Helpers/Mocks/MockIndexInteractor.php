<?php
namespace Se7enChat\Tests\Helpers\Mocks;
use Se7enChat\Boundaries\IndexInputPort;
use Se7enChat\Boundaries\IndexOutputPort;

class MockIndexInteractor implements IndexInputPort
{
    public static $mainWasCalled = false;

    public function main(array $data)
    {
        self::$mainWasCalled = true;
    }

    public function setOutputPort(IndexOutputPort $port)
    {
        $this->outputPort = $port;
    }
}
