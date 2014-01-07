<?php
namespace Se7enChat\Libraries\Web\Presenters;
use Se7enChat\Boundaries\IndexOutputPort;
use Se7enChat\Gateways\UserInterfaceGateway;

class IndexPresenter implements IndexOutputPort
{
    private $userInterface;

    public function __construct(UserInterfaceGateway $ui)
    {
        $this->userInterface = $ui;
    }

    public function render(array $information)
    {
        $this->userInterface->render($information);
    }
}
