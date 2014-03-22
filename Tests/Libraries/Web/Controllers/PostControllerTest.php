<?php
namespace Se7enChat\Tests\Libraries\Web\Controllers;

class PostControllerTest extends \PHPUnit_Framework_TestCase
{
    private $controller;
    private $interactor;

    public function setUp()
    {
        $this->interactor = $this->getMock(
            'Se7enChat\Interactors\PostInteractor');
        $this->controller = $this->getNewController();
    }

    public function tearDown()
    {
        unset($this->controller, $this->interactor);
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
        $controller = $this->getNewController($emptyAjaxValues = true);
        $controller->savePost();
    }

    public function testCallsGetPostByIdOnInteractor()
    {
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
        $controller = $this->getNewController($emptyAjaxData = true);
        $controller->getPostById();
    }

    public function testGetsLastPostId()
    {
        $this->interactor->expects($this->once())
            ->method('getLastPostId');
        $this->controller->getLastPostId();
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage No post ID given.
     */
    public function testThrowsExceptionNoIdIsGiven()
    {
        $controller = $this->getNewController($emptyAjaxData = true);
        $controller->getPostsWithIdGreaterThan();
    }

    public function testGetsPostsWithIdGreaterThanId()
    {
        $this->interactor->expects($this->once())
            ->method('getPostsWithIdGreaterThan');
        $this->controller->getPostsWithIdGreaterThan();
    }

    private function getNewController($emptyAjaxData=false)
    {
        $controller = $this->getMock(
            'Se7enChat\Libraries\Web\Controllers\PostController',
            array('getAjaxData'),
            array($this->interactor));
        $controller
            ->expects($this->any())
            ->method('getAjaxData')
            ->will($this->returnValue(
                $this->getPostValues($emptyAjaxData)));
        return $controller;
    }

    private function getPostValues($empty)
    {
        return json_decode($empty ? '{}' : '{
            "post_id": 1,
            "user_id": 1,
            "room_id": 1,
            "text": "test post"
        }');
    }
}
