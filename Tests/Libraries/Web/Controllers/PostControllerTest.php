<?php
namespace Se7enChat\Tests\Libraries\Web\Controllers;
use Se7enChat\Libraries\Web\Controllers\PostController;
use Se7enChat\Libraries\Database\Test\PostData;

class PostControllerTest extends \PHPUnit_Framework_TestCase
{
    private $controller;
    private $interactor;

    public function setUp()
    {
        $this->interactor = $this->getMock(
            'Se7enChat\Interactors\PostInteractor');
        $this->controller = new PostController(
            $this->interactor);
        $this->definePostValues();
    }

    public function tearDown()
    {
        unset($this->controller, $this->interactor, $_POST);
    }

    public function testCallsSavePostOnInteractor()
    {
        $this->interactor->expects($this->once())->method('savePost');
        $this->controller->savePost();
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Unable to save post.
     */
    public function testSavePostThrowsExceptionWhenThereAreNoPostValues()
    {
        $this->unsetPostValues();
        $this->controller->savePost();
    }

    public function testCallsGetPostByIdOnInteractor()
    {
        $_POST['post_id'] = 1;
        $this->interactor->expects($this->once())
            ->method('getPostById')
            ->with(1);
        $this->controller->getPostById();
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage No post ID given.
     */
    public function testThrowsExceptionWhenPostIdIsNotSet()
    {
        $this->controller->getPostById();
    }

    private function definePostValues()
    {
        $_POST = array(
            'user_id' => 1,
            'room_id' => 1,
            'text' => 'test post'
        );
    }

    private function unsetPostValues()
    {
        unset($_POST);
    }
}
