<?php
namespace Se7enChat\Tests\Interactors;
use Se7enChat\Interactors\PostInteractor;
use Se7enChat\Libraries\Database\Test\PostData;

class PostInteractorTest extends \PHPUnit_Framework_TestCase
{
    private $interactor;

    public function setUp()
    {
        $dependencyBuilder = $this->getMock(
            'Se7enChat\Libraries\Web\DependencyBuilders\PostDependencyBuilder',
            array('getNewDatabase'));

        $dependencyBuilder->expects($this->any())
            ->method('getNewDatabase')
            ->will($this->returnValue(new PostData));

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

    public function testDoesSavePost()
    {
        $post = $this->getFakeInputPostData(1);
        $this->interactor->savePost($post);
        $post = $this->interactor->getPostById(1);
        $this->assertEquals(1, $post['id']);
    }

    public function testDoesGetPostById()
    {
        $post = $this->interactor->getPostById(1);
        $this->assertEquals(1, $post['id']);
    }

    public function testDoesGetPostsWithIdGreaterThanThatWhichIsGiven()
    {
        $posts = $this->interactor->getPostsWithIdGreaterThan(1);
        foreach($posts as $post) {
            $this->assertTrue($post['id'] > 1);
        }
    }

    public function testDoesDeletePostById()
    {
        $this->interactor->deletePostById(1337);
        $post = $this->interactor->getPostById(1337);
        $this->assertTrue($post === array());
    }

    public function getFakeInputPostData($id)
    {
        return array(
            'roomId' => $id,
            'userId' => 1,
            'text' => sprintf('Post %d', $id)
        );
    }
}
