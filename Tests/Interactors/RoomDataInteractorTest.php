<?php
namespace Se7enChat\Tests\Interactors;
use Se7enChat\Entities\Room;
use Se7enChat\Interactors\RoomDataInteractor;
use Se7enChat\Libraries\Database\Test\RoomData;


class RoomDataInteractorTest extends \PHPUnit_Framework_TestCase
{
    private $room;
    private $interactor;

    public function setUp()
    {
        $this->room = new Room(1, 'name');
        $this->interactor = new RoomDataInteractor(new RoomData());
    }

    public function tearDown()
    {
        unset($this->room);
        unset($this->interactor);
    }

    public function testCanDeleteAllPostsBelongingToRoom()
    {
        $this->assertTrue(
            $this->interactor->deleteRoomPosts(
                $this->room->getId()
            )
        );
    }

    public function testCanDeleteRoom()
    {
        $this->assertTrue(
            $this->interactor->deleteRoom(
                $this->room->getId()
            )
        );
    }

    public function testCanCreateNewRoom()
    {
        $this->assertEquals(
            3, $this->interactor->createRoom('name'));
    }

    public function testCanGetRoomNameById()
    {
        $this->assertNotEmpty(
            $this->interactor->getRoomName(3));
    }

    public function testCanCreateRoomObjectFromId()
    {
        $this->assertInstanceOf(
            'Se7enChat\Entities\Room',
            $this->interactor->createRoomObject(3)
        );
    }
}
