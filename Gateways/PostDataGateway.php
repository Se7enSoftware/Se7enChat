<?php
namespace Se7enChat\Gateways;

interface PostDataGateway
{
    public function savePost(array $post);
    public function deletePost($id);
    public function getPostById($id);
    public function getPostsWithIdGreaterThan($id);
}
