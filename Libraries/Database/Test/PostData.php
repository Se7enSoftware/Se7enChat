<?php
namespace Se7enChat\Libraries\Database\Test;
use Se7enChat\Gateways\PostDataGateway;

class PostData implements PostDataGateway
{
    public function savePost(array $postInfo)
    {}

    public function deletePostById($id)
    {}

    public function getPostById($id)
    {
        if ($id === 1337) {
            return array();
        }
        return $this->genericPost($id);
    }

    public function getPostsWithIdGreaterThan($id)
    {
        return array(
            $this->genericPost($id + 1),
            $this->genericPost($id + 2)
        );
    }

    private function genericPost($id)
    {
        return array(
            'id' =>     $id,
            'roomId' => 1,
            'userId' => 1,
            'text' =>   'text'
        );
    }
}
