<?php
namespace Se7enChat\Libraries\Web\Controllers;
use Se7enChat\Boundaries\PostInputPort;

class PostController
{
    private $interactor;

    public function __construct(PostInputPort $interactor)
    {
        $this->interactor = $interactor;
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

    private function allPostValuesAreSet()
    {
        return isset($_POST['user_id'], $_POST['room_id'], $_POST['text']);
    }
}
