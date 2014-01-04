<?php
namespace Se7enChat\Entities\Users;

class User
{
    private $name;
    private $email;
    private $avatar;

    public function __construct(array $userInformation)
    {
        $this->setUserInfo($userInformation);
    }

    public function getId()
    {
        return $this->id;
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
        $this->id = $info['id'];
        $this->name = $info['name'];
        $this->email = $info['email'];
        $this->avatar = $info['avatar'];
    }
}
