<?php
namespace Se7enChat\Libraries\Database\Test;
use Se7enChat\Gateways\PostDataGateway;

class PostData implements PostDataGateway
{
    public function savePost(array $postInfo)
    {
        MemoryDatabase::add('post_' . $postInfo['id'], $postInfo);
        return true;
    }

    public function deletePost($id)
    {
        MemoryDatabase::delete('post_' . $id);
        return true;
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
