<?php
namespace Se7enChat\Tests\Libraries\Router;

class TestAction
{
    public static $mainWasCalled = false;
    public static $staticMainWasCalled = false;

    public function main()
    {
        self::$mainWasCalled = true;
    }

    public static function staticMain()
    {
        self::$staticMainWasCalled = true;
    }
}
