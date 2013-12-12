<?php
namespace Se7enChat\tests\src\rooms;
use Se7enChat\src\rooms\Room;
use Se7enChat\tests\helpers\PostHelper;

class RoomTest extends \PHPUnit_Framework_TestCase
{
    private $room;

    public function setUp()
    {
        $this->room = new Room('room name');
    }

    public function testRoomHasName()
    {
        $this->assertNotEmpty($this->room->getName());
    }

    public function testPostCollectionCanBeEmptyArray()
    {
        $posts = $this->room->getPosts();
        $this->assertTrue(is_array($posts) && count($posts) == 0);
    }

    public function testPostCollectionReturnsArrayOfPostObjects()
    {
        $room = new Room('name');
        $this->populatePostArray($room);
        $posts = $room->getPosts();

        foreach ($posts as $post) {
            $this->assertInstanceOf('Se7enChat\src\posts\Post', $post);
        }
    }

    public function testCanGetPostById()
    {
        $room = new Room('name');
        $this->populatePostArray($room);

        $this->assertEquals(2, $room->getPostById(2)->getId());
    }

    public function testCanTruncatePostsFromRoom()
    {
        $room = new Room('name');
        $this->populatePostArray($room);
        $room->truncatePosts();

        $this->assertEmpty($room->getPosts());
    }

    private function populatePostArray(Room $room)
    {
        $room->addPost(PostHelper::createPostObject(1));
        $room->addPost(PostHelper::createPostObject(2));
        $room->addPost(PostHelper::createPostObject(3));
        $room->addPost(PostHelper::createPostObject(4));
    }
}
