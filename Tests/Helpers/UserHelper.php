<?php
namespace Se7enChat\Tests\Helpers;
use Se7enChat\Entities\User;
use Se7enChat\Entities\Post;

class UserHelper
{
    public static function createUserObject()
    {
        return new User(self::fauxUserDetails());
    }

    private static function fauxUserDetails()
    {
        return array(
            'id' => 1,
            'name' => 'Se7enRobot',
            'email' => 'se7en-robot@spamfactory.com',
            'avatar' => null
        );
    }
}
