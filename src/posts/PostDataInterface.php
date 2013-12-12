<?php
namespace Se7enChat\src\posts;

interface PostDataInterface
{
    public function savePost(Post $post);
    public function deletePost($id);
    public function getPostById($id);
    public function getPostsWithIdGreaterThan($id);
}
