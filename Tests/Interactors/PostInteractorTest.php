<?php
namespace Se7enChat\Tests\Interactors;
use Se7enChat\Interactors\PostInteractor;
use Se7enChat\Libraries\Web\DependencyBuilders\PostDependencyBuilder;
use Se7enChat\Libraries\Database\SQLite\PostData;

class PostInteractorTest extends \PHPUnit_Framework_TestCase
{
    private $interactor;
    private $database;
    private $presenter;

    public function setUp()
    {
        $this->database = $this->getNewDatabase();
        $this->presenter = $this->getNewPresenter();
        $dependencyBuilder = $this->getNewDependencyBuilder();

        $this->defineBuilderExpectations($dependencyBuilder);
        $this->defineDatabaseExpectations($this->database);

        $this->interactor = new PostInteractor;
        $this->interactor->setDependencies($dependencyBuilder);
    }

    public function tearDown()
    {
        unset($this->interactor, $this->database, $this->presenter);
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

    public function testGetsPostByIdFromDatabase()
    {
        $this->database->expects($this->once())
            ->method('getPostById')
            ->with(1);
        $this->interactor->getPostById(1);
    }

    public function testOutputsPostViaPresenter()
    {
        $this->presenter->expects($this->once())
            ->method('outputPost')
            ->with(array());
        $this->interactor->getPostById(1);
    }

    public function testGetsPostsNewerThanIdFromDatabase()
    {
        $this->database->expects($this->once())
            ->method('getPostsWithIdGreaterThan')
            ->with(1);
        $this->interactor->getPostsWithIdGreaterThan(1);
    }

    public function testOutputsPostsViaPresenter()
    {
        $this->presenter->expects($this->once())
            ->method('outputPosts')
            ->with(array());
        $this->interactor->getPostsWithIdGreaterThan(1);
    }

    public function testDoesDeletePostFromDatabase()
    {

        $this->database->expects($this->once())
            ->method('deletePostById')
            ->with(1);
        $this->interactor->deletePostById(1);
    }

    private function getNewPresenter()
    {
        return $this->getMock(
            'Se7enChat\Libraries\Web\Presenters\PostPresenter');
    }

    private function getNewDatabase()
    {
        return $this->getMock(
            'Se7enChat\Libraries\Database\SQLite\PostData');
    }

    private function getNewDependencyBuilder()
    {
        return $this->getMock(
            'Se7enChat\Libraries\Web\DependencyBuilders\PostDependencyBuilder');
    }

    private function defineBuilderExpectations(PostDependencyBuilder $dependencyBuilder)
    {
        $dependencyBuilder->expects($this->once())
            ->method('getNewDatabase')
            ->will($this->returnValue($this->database));

        $dependencyBuilder->expects($this->once())
            ->method('getNewPresenter')
            ->will($this->returnValue($this->presenter));
    }

    private function defineDatabaseExpectations(PostData $database)
    {
        $database->expects($this->any())
            ->method('getPostById')
            ->will($this->returnValue(array()));

        $database->expects($this->any())
            ->method('getPostsWithIdGreaterThan')
            ->will($this->returnValue(array()));
    }
}
