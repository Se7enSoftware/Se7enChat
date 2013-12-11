<?php
namespace Se7enChat\data\test;
use Se7enChat\src\posts\DataInterface;
use Se7enChat\src\posts\Post;

class PostData implements DataInterface
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
}
