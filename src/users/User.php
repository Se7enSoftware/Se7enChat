<?php
namespace Se7enChat\src\users;

class User
{
    private $name;
    private $email;
    private $avatar;

    public function __construct(array $userInformation)
    {
        $this->setUserInfo($userInformation);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    private function setUserInfo(array $info)
    {
        $this->name = $info['name'];
        $this->email = $info['email'];
        $this->avatar = $info['avatar'];
    }
}
