<?php
namespace Se7enChat\Tests\Interactors;
use Se7enChat\Interactors\PostInteractor;

class PostInteractorTest extends \PHPUnit_Framework_TestCase
{
    private $interactor;

    public function setUp()
    {
        $dependencyBuilder = $this->getMock(
            'Se7enChat\Libraries\Web\DependencyBuilders\PostDependencyBuilder');

        $this->database = $this->getMock(
            'Se7enChat\Libraries\Database\SQLite\PostData');

        $dependencyBuilder->expects($this->once())
            ->method('getNewDatabase')
            ->will($this->returnValue($this->database));

        $this->interactor = new PostInteractor;
        $this->interactor->setDependencies($dependencyBuilder);
    }

    public function tearDown()
    {
        unset($this->interactor);
    }

    public function testIsInstanceOfInputPort()
    {
        $this->assertInstanceOf(
            'Se7enChat\Boundaries\PostInputPort',
            $this->interactor
        );
    }

    public function testDoesCallSavePostOnDatabaseAbstraction()
    {
        $this->database->expects($this->once())
            ->method('savePost')
            ->with(array());
        $this->interactor->savePost($info = array());
    }

    public function testDoesCallGetPostByIdOnDatabaseAbstraction()
    {
        $this->database->expects($this->once())
            ->method('getPostById')
            ->with(1);
        $post = $this->interactor->getPostById(1);
    }

    public function testDoesCallGetPostsWithIdGreaterThan()
    {
        $this->database->expects($this->once())
            ->method('getPostsWithIdGreaterThan')
            ->with(1);
        $posts = $this->interactor->getPostsWithIdGreaterThan(1);
    }

    public function testDoesCallDeletePost()
    {

        $this->database->expects($this->once())
            ->method('deletePostById')
            ->with(1);
        $this->interactor->deletePostById(1);
    }
}
