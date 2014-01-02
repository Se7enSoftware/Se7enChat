<?php
namespace Se7enChat\Entities\Rooms;

Interface RoomDataInterface
{
    public function deletePosts($roomId);
    public function deleteRoom($roomId);
    public function createRoom($roomName);
    public function getRoomNameFromId($id);
}
