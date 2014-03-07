<?php
namespace Se7enChat\Tests\Interactors;
use Se7enChat\Interactors\RoomInteractor;

class RoomInteractorTest extends \PHPUnit_Framework_TestCase
{
    private $room;
    private $interactor;
    private $database;

    public function setUp()
    {
        $this->database = $this->getMock(
            'Se7enChat\Libraries\Database\SQLite\RoomData');

        $dependencyBuilder = $this->getMock(
            'Se7enChat\Libraries\Web\DependencyBuilders\RoomDependencyBuilder');
        $dependencyBuilder->expects($this->once())
            ->method('getNewDatabase')
            ->will($this->returnValue($this->database));

        $this->interactor = new RoomInteractor;
        $this->interactor->setDependencies($dependencyBuilder);
    }

    public function tearDown()
    {
        unset($this->database);
        unset($this->interactor);
    }

    public function testCallsDeleteRoomOnDatabase()
    {
        $this->database->expects($this->once())
            ->method('deleteRoom')
            ->with(1);
        $this->interactor->deleteRoom(1);
    }

    public function testCallsCreateRoomOnDatabase()
    {
        $this->database->expects($this->once())
            ->method('createRoom')
            ->with('Room Name');
        $this->interactor->createRoom('Room Name');
    }

    public function testGetsRoomNameFromIdFromDatabase()
    {
        $this->database->expects($this->once())
            ->method('getRoomNameFromId')
            ->with(1);
        $this->interactor->getRoomName(1);
    }

    public function testDoesCreateRoomObjectFromId()
    {
        $this->database->expects($this->once())
            ->method('getRoomNameFromId')
            ->will($this->returnValue('Room Name'));
        $this->assertInstanceOf(
            'Se7enChat\Entities\Room',
            $this->interactor->createRoomObject(1)
        );
    }
}
