<?php
namespace Se7enChat\tests\helpers;
use Se7enChat\src\posts\Post;
use Se7enChat\tests\helpers\UserHelper;

class PostHelper
{
    public static function createPostObject($id)
    {
        return new Post($id, 1, UserHelper::createUserObject(), 'messge text');
    }
}
