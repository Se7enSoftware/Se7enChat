<?php
namespace Se7enChat\Libraries\Web\Controllers;
use Se7enChat\Boundaries\PostInputPort;
use Se7enChat\Libraries\Web\DependencyBuilders\PostDependencyBuilder;

class PostController
{
    private $interactor;
    private $ajaxData;

    public function __construct(PostInputPort $interactor)
    {
        $this->interactor = $interactor;
    }

    public function savePost()
    {
        $this->ensureProperDependencies();
        if (!$this->allPostValuesAreSet()) {
            throw new \Exception('Unable to save post.');
        }
        $this->interactor->savePost(array(
            'user_id' => (int) $this->ajaxData->user_id,
            'room_id' => (int) $this->ajaxData->room_id,
            'text' => $this->ajaxData->text
        ));
    }

    public function getPostById()
    {
        $this->ensureProperDependencies();
        if (!isset($this->ajaxData->post_id)) {
            throw new \Exception('No post ID given.');
        }
        $id = (int) $this->ajaxData->post_id;
        $this->interactor->getPostById($id);
    }

    protected function getInteractorDependencyBuilder()
    {
        // This can be mocked out for testing.
        return new PostDependencyBuilder;
    }

    protected function getAjaxData()
    {
        return json_decode(file_get_contents('php://input'));
    }

    private function allPostValuesAreSet()
    {
        return isset(
            $this->ajaxData->user_id,
            $this->ajaxData->room_id,
            $this->ajaxData->text);
    }

    private function ensureProperDependencies()
    {
        $this->ajaxData = $this->getAjaxData();
        $this->interactor->setDependencies(
            $this->getInteractorDependencyBuilder());
    }
}
