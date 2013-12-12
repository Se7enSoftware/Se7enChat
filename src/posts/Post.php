<?php
namespace Se7enChat\src\posts;
use Se7enChat\src\users\User;

class Post
{
    private $id;
    private $roomId;
    private $messageText;
    private $user;

    public function __construct($id, $roomId, User $user, $defaultText)
    {
        // That's enough parameters. Four is the maximum I'll allow.
        $this->setId($id);
        $this->setRoomId($roomId);
        $this->setUser($user);
        $this->setText($defaultText);
    }

    public function getText()
    {
        return $this->messageText;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRoomId()
    {
        return $this->roomId;
    }

    private function setId($id)
    {
        $this->id = $id;
    }

    private function setRoomId($room)
    {
        $this->roomId = $room;
    }

    private function setText($string)
    {
        $this->messageText = $string;
    }

    private function setUser(User $user)
    {
        $this->user = $user;
    }
}
