<?php
namespace Se7enChat\Interactors;
use Se7enChat\Interactors\DependencyContracts\RoomDependencyContract;
use Se7enChat\Gateways\RoomDataGateway;
use Se7enChat\Entities\Room;

class RoomInteractor
{
    private $dataLayer;
    private $dependencies;

    public function setDependencies(RoomDependencyContract $dependencies)
    {
        $this->dependencies = $dependencies;
        $this->dataLayer = $dependencies->getNewDatabase();
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
