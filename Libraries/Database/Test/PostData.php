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
    {}

    public function getPostsWithIdGreaterThan($id)
    {}
}
