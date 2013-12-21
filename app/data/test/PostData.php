<?php
namespace Se7enChat\app\data\test;
use Se7enChat\src\posts\PostDataInterface;
use Se7enChat\src\posts\Post;

class PostData implements PostDataInterface
{
    public function savePost(Post $post)
    {
        return MemoryDatabase::add('post_' . $post->getId(), $post);
    }

    public function deletePost($id)
    {
        return MemoryDatabase::delete('post_' . $id);
    }

    public function getPostById($id)
    {
        return MemoryDatabase::getByName('post_' . $id);
    }

    public function getPostsWithIdGreaterThan($id)
    {
        return array(
            array(
                'id' =>     2,
                'roomId' => 1,
                'userId' => 1,
                'text' =>   'text'
            ),
            array(
                'id' =>     2,
                'roomId' => 1,
                'userId' => 1,
                'text' =>   'text'
            )
        );
    }
}
