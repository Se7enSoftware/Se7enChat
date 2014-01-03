<?php
namespace Se7enChat\Gateways;

Interface RoomDataGateway
{
    public function deletePosts($roomId);
    public function deleteRoom($roomId);
    public function createRoom($roomName);
    public function getRoomNameFromId($id);
}
