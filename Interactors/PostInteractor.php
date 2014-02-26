<?php
namespace Se7enChat\Interactors;
use Se7enChat\Boundaries\PostInputPort;
use Se7enChat\Interactors\DependencyContracts\PostDependencyContract;

class PostInteractor implements PostInputPort
{
    private $database;
    private $dependencies;

    public function setDependencies(PostDependencyContract $dependencies)
    {
        $this->dependencies = $dependencies;
        $this->database = $this->dependencies->getNewDatabase();
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
