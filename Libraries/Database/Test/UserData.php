<?php
namespace Se7enChat\Libraries\Database\Test;
use Se7enChat\Gateways\UserDataGateway;

class UserData implements UserDataGateway
{
    public function getUserFromId($id)
    {
        return array(
            'id' => 1,
            'name' => 'Se7enChat',
            'email' => 'fake@fake.com',
            'avatar' => 'http://img.com/img.jpg'
        );
    }
}
