<?php
namespace Se7enChat\Libraries\Database\Test;
use Se7enChat\Entities\Rooms\RoomDataInterface;
use Se7enChat\Entities\Rooms\Room;

class RoomData implements RoomDataInterface
{
    public function deletePosts($roomId)
    {
        // Oh yes, I totally deleted those posts.
        return true;
    }

    public function deleteRoom($roomId)
    {
        // Absolutely, I'll delete myself.
        return true;
    }

    public function createRoom($name)
    {
        // Yes, I'll "create" a new room for you.
        // Return a number that would normally be the id of the post created.
        return 3;
    }

    public function getRoomNameFromId($id)
    {
        return 'name';
    }
}
