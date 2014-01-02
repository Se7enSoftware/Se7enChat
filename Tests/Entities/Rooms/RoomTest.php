<?php
namespace Se7enChat\tests\Entities\Rooms;
use Se7enChat\Entities\Rooms\Room;
use Se7enChat\tests\helpers\PostHelper;

class RoomTest extends \PHPUnit_Framework_TestCase
{
    private $room;

    public function setUp()
    {
        $this->room = new Room(1, 'room name');
        $this->populatePostArray($this->room);
    }

    public function tearDown()
    {
        unset($this->room);
    }

    public function testRoomHasName()
    {
        $this->assertNotEmpty($this->room->getName());
    }

    public function testRoomCanGetId()
    {
        $this->assertTrue(
            is_int($this->room->getId())
        );
    }

    public function testPostCollectionCanBeEmptyArray()
    {
        $this->room->truncatePosts();
        $posts = $this->room->getPosts();
        $this->assertTrue(is_array($posts) && count($posts) == 0);
    }

    public function testPostCollectionReturnsArrayOfPostObjects()
    {
        $posts = $this->room->getPosts();
        foreach ($posts as $post) {
            $this->assertInstanceOf('Se7enChat\Entities\Posts\Post', $post);
        }
    }

    public function testCanGetPostById()
    {
        $this->assertEquals(2, $this->room->getPostById(2)->getId());
    }

    public function testCanTruncatePostsFromRoom()
    {
        $this->room->truncatePosts();
        $this->assertEmpty($this->room->getPosts());
    }

    private function populatePostArray(Room $room)
    {
        $room->addPost(PostHelper::createPostObject(1));
        $room->addPost(PostHelper::createPostObject(2));
        $room->addPost(PostHelper::createPostObject(3));
        $room->addPost(PostHelper::createPostObject(4));
    }
}
