<?php
namespace Se7enChat\tests\src\posts;
use Se7enChat\src\posts\PostDataInteractor;
use Se7enChat\data\test\PostData;
use Se7enChat\tests\helpers\PostHelper;

class PostDataInteractorTest extends \PHPUnit_Framework_TestCase
{
    private $dataInteractor;

    public function setUp()
    {
        $this->dataInteractor = new PostDataInteractor(new PostData);
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
            'Se7enChat\src\posts\Post',
            $this->dataInteractor->getPostById(1));
    }
}