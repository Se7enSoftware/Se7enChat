<?php
namespace Se7enChat\tests\helpers;
use Se7enChat\src\users\User;
use Se7enChat\src\posts\Post;

class UserHelper
{
    public static function createUserObject()
    {
        return new User(self::fauxUserDetails());
    }

    private static function fauxUserDetails()
    {
        return array(
            'name' => 'Se7enRobot',
            'email' => 'se7en-robot@spamfactory.com',
            'avatar' => null
        );
    }
}
