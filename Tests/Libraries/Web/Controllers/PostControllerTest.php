<?php
namespace Se7enChat\Tests\Libraries\Web\Controllers;
use Se7enChat\Libraries\Web\Controllers\PostController;
use Se7enChat\Interactors\PostInteractor;
use Se7enChat\Libraries\Database\Test\PostData;

class PostControllerTest extends \PHPUnit_Framework_TestCase
{
    private $controller;

    public function setUp()
    {
        $this->interactor = $this->getMock(
            '\Se7enChat\Interactors\PostInteractor');
        $this->interactor->setDatabase(
            new PostData);
        $this->controller = new PostController(
            $this->interactor);
    }

    public function tearDown()
    {
        unset($this->controller);
    }

    public static function setUpBeforeClass()
    {
        $_POST = array(
            'user_id' => 1,
            'room_id' => 1,
            'text' => 'test post'
        );
    }

    public static function tearDownAfterClass()
    {
        unset($_POST);
    }

    public function testCallsSavePostOnInteractor()
    {
        $this->interactor->expects($this->once())->method('savePost');
        $this->controller->savePost();
    }

    /**
     * @expectedException Exception
     */
    public function testSavePostThrowsExceptionWhenThereAreNoPostValues()
    {
        unset($_POST['user_id'], $_POST['room_id'], $_POST['text']);
        $this->controller->savePost();
    }
}
