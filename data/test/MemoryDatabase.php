<?php
namespace Se7enChat\data\test;

class MemoryDatabase
{
    private static $data = array();

    public static function add($name, $value)
    {
        self::$data[$name] = $value;
        return true;
    }

    public function getByName($name)
    {
        return self::$data[$name];
    }

    public static function delete($name)
    {
        if (isset(self::$data[$name])) {
            unset(self::$data[$name]);
            return true;
        }
        return false;
    }
}
