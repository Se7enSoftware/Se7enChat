<?php
namespace Se7enChat\Libraries\Web\Controllers;
use Se7enChat\Boundaries\PostInputPort;
use Se7enChat\Libraries\Web\DependencyBuilders\PostDependencyBuilder;

class PostController
{
    private $interactor;

    public function __construct(PostInputPort $interactor)
    {
        $this->interactor = $interactor;
        $this->interactor->setDependencies(
            $this->getInteractorDependencyBuilder());
    }

    public function savePost()
    {
        if (!$this->allPostValuesAreSet()) {
            throw new \Exception('Unable to save post.');
        }
        $this->interactor->savePost(array(
            'user_id' => (int) $_POST['user_id'],
            'room_id' => (int) $_POST['room_id'],
            'text' => $_POST['text']
        ));
    }

    public function getPostById()
    {
        if (!isset($_POST['post_id'])) {
            throw new \Exception('No post ID given.');
        }
        $id = (int) $_POST['post_id'];
        $this->interactor->getPostById($id);
    }

    private function allPostValuesAreSet()
    {
        return isset($_POST['user_id'], $_POST['room_id'], $_POST['text']);
    }

    private function getInteractorDependencyBuilder()
    {
        // This can be mocked out for testing.
        return new PostDependencyBuilder;
    }
}
