<?php
namespace Se7enChat\Libraries\Database\Test;
use Se7enChat\Gateways\PostDataGateway;
use Se7enChat\Entities\Posts\Post;

class PostData implements PostDataGateway
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
