<?php
namespace Se7enChat\Tests\Entities;
use Se7enChat\Tests\Helpers\PostHelper;

class PostTest extends \PHPUnit_Framework_TestCase
{
    private $post;

    public function setUp()
    {
        // The 1 here represents the id of the post.
        $this->post = PostHelper::createPostObject(1);
    }

    public function tearDown()
    {
        unset($this->post);
    }

    public function testHasText()
    {
        $this->assertNotEmpty($this->post->getText());
    }

    public function testContainsReferenceToUserObject()
    {
        $this->assertInstanceOf('Se7enChat\Entities\User', $this->post->getUser());
    }

    public function testHasId()
    {
        $this->assertTrue(
            is_int($this->post->getId())
        );
    }

    public function testPostBelongsToRoom()
    {
        $this->assertTrue(
            is_int($this->post->getRoomId()) && $this->post->getRoomId() > 0
        );
    }
}
