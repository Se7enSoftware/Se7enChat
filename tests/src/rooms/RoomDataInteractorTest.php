<?php
namespace Se7enChat\tests\src\rooms;
use Se7enChat\src\rooms\Room;
use Se7enChat\src\rooms\RoomDataInteractor;
use Se7enChat\data\test\RoomData;


class RoomDataInteractorTest extends \PHPUnit_Framework_TestCase
{
    private $room;
    private $interactor;

    public function setUp()
    {
        $this->room = new Room(1, 'name');
        $this->interactor = new RoomDataInteractor(new RoomData());
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
            'Se7enChat\src\rooms\Room',
            $this->interactor->createRoomObject(3)
        );
    }
}
