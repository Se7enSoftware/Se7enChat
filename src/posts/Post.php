<?php
namespace Se7enChat\src\posts;
use Se7enChat\src\users\User;

class Post
{
    private $messageText;
    private $user;

    public function __construct($id, User $user, $defaultText)
    {
        $this->setId($id);
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

    private function setId($id)
    {
        $this->id = $id;
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
