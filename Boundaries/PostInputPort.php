<?php
namespace Se7enChat\Boundaries;

interface PostInputPort
{
    public function savePost(array $post);
    public function deletePostById($id);
    public function getPostById($id);
    public function getPostsWithIdGreaterThan($id);
}
