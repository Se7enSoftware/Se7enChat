<?php
namespace Se7enChat\Tests\Helpers;
use Se7enChat\Entities\Users\User;
use Se7enChat\Entities\Posts\Post;

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
