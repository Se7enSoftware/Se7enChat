<?php
namespace Se7enChat\Interactors;
use Se7enChat\Gateways\RoomDataGateway;
use Se7enChat\Entities\Room;

class RoomDataInteractor
{
    private $dataLayer;

    public function __construct(RoomDataGateway $dataLayer)
    {
        $this->dataLayer = $dataLayer;
    }

    public function deleteRoomPosts($roomId)
    {
        return $this->dataLayer->deletePosts($roomId);
    }

    public function deleteRoom($roomId)
    {
        return $this->dataLayer->deleteRoom($roomId);
    }

    public function createRoom($name)
    {
        return $this->dataLayer->createRoom($name);
    }

    public function getRoomName($id)
    {
        return $this->dataLayer->getRoomNameFromId($id);
    }

    public function createRoomObject($id)
    {
        return new Room($id, $this->getRoomName($id));
    }
}
