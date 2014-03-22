<?php
namespace Se7enChat\Interactors;
use Se7enChat\Boundaries\PostInputPort;
use Se7enChat\Interactors\DependencyContracts\PostDependencyContract;

class PostInteractor implements PostInputPort
{
    private $database;
    private $dependencies;
    private $presenter;

    public function setDependencies(PostDependencyContract $dependencies)
    {
        $this->dependencies = $dependencies;
        $this->database = $this->dependencies->getNewDatabase();
        $this->presenter = $this->dependencies->getNewPresenter();
    }

    public function savePost(array $postInfo)
    {
        $this->database->savePost($postInfo);
    }

    public function getPostById($id)
    {
        $this->presenter->outputPost(
            $this->database->getPostById($id));
    }

    public function getLastPostId()
    {
        $this->presenter->outputPostId(
            $this->database->getLastPostId());
    }

    public function getPostsWithIdGreaterThan($id)
    {
        $this->presenter->outputPosts(
            $this->database->getPostsWithIdGreaterThan($id));
    }

    public function deletePostById($id)
    {
        $this->database->deletePostById($id);
    }
}
