<?php
namespace Se7enChat\Interactors;
use Se7enChat\Gateways\PostDataGateway;
use Se7enChat\Boundaries\PostInputPort;

class PostInteractor implements PostInputPort
{
    private $database;

    public function __construct(PostDataGateway $database)
    {
        $this->database = $database;
    }

    public function savePost(array $postInfo)
    {
        $this->database->savePost($postInfo);
    }

    public function getPostById($id)
    {
        return $this->database->getPostById($id);
    }

    public function getPostsWithIdGreaterThan($id)
    {
        return $this->database->getPostsWithIdGreaterThan($id);
    }

    public function deletePostById($id)
    {
        $this->database->deletePostById($id);
    }
}
