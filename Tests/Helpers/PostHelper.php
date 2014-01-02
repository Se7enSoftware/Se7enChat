<?php
namespace Se7enChat\Tests\Helpers;
use Se7enChat\Entities\Posts\Post;
use Se7enChat\Tests\Helpers\UserHelper;

class PostHelper
{
    public static function createPostObject($id)
    {
        return new Post($id, 1, UserHelper::createUserObject(), 'messge text');
    }
}
