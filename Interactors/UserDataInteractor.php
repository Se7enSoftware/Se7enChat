<?php
namespace Se7enChat\Interactors;
use Se7enChat\Entities\User;
use Se7enChat\Gateways\UserDataGateway;

class UserDataInteractor
{
    private $dataLayer;

    public function __construct(UserDataGateway $dataLayer)
    {
        $this->dataLayer = $dataLayer;
    }

    public function getUserFromId($id)
    {
        return new User(
            $this->dataLayer->getUserFromId($id));
    }
}
