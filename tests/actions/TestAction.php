<?php
namespace Se7enChat\tests\actions;

class TestAction
{
    // Used to test the router.
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
