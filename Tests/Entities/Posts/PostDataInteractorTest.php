<?php
namespace Se7enChat\Tests\Entities\Posts;
use Se7enChat\Entities\Posts\PostDataInteractor;
use Se7enChat\Libraries\Database\Test\PostData;
use Se7enChat\Tests\Helpers\PostHelper;

class PostDataInteractorTest extends \PHPUnit_Framework_TestCase
{
    private $dataInteractor;

    public function setUp()
    {
        $this->dataInteractor = new PostDataInteractor(new PostData);
    }

    public function tearDown()
    {
        unset($this->dataInteractor);
    }

    public function testCanSavePost()
    {
        $saved = $this->dataInteractor->savePost(
            PostHelper::createPostObject(1));
        $this->assertTrue($saved);
    }

    public function testCanDeletePost()
    {
        $deleted = $this->dataInteractor->deletePost(1);
        $this->assertTrue($deleted);
    }

    public function testCanGetPostById()
    {
        $this->dataInteractor->savePost(
            PostHelper::createPostObject(1));

        $this->assertInstanceOf(
            'Se7enChat\Entities\Posts\Post',
            $this->dataInteractor->getPostById(1));
    }

    public function testCanGetPostsDataWithIdGreaterThanNumber()
    {
        $posts = $this->dataInteractor->getNewPostsAfter(1);
        foreach ($posts as $post) {
            $this->assertNotEmpty($post['id']);
            $this->assertNotEmpty($post['roomId']);
            $this->assertNotEmpty($post['userId']);
            $this->assertNotEmpty($post['text']);
        }
    }
}
