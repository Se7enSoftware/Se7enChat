<?php
namespace Se7enChat\src\rooms;

Interface RoomDataInterface
{
    public function deletePosts($roomId);
    public function deleteRoom($roomId);
    public function createRoom($roomName);
    public function getRoomNameFromId($id);
}
