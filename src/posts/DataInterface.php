<?php
namespace Se7enChat\src\posts;

interface DataInterface
{
    public function savePost(Post $post);

    public function deletePost($id);
}
