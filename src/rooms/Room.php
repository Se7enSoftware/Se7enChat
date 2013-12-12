<?php
namespace Se7enChat\src\rooms;

class Room
{
    private $id;
    private $name;
    private $posts = array();

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function addPost($post)
    {
        $this->posts[$post->getId()] = $post;
    }

    public function getPosts()
    {
        return array_values($this->posts);
    }

    public function getPostById($id)
    {
        return $this->posts[$id];
    }

    public function truncatePosts()
    {
        array_splice($this->posts, 0);
    }
}
