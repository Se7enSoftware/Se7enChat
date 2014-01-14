<?php
namespace Se7enChat\Libraries\Web\Presenters;
use Se7enChat\Boundaries\IndexOutputPort;
use Se7enChat\Gateways\UserInterfaceGateway;

class IndexPresenter implements IndexOutputPort
{
    private $userInterface;
    private $lessUrl;
    private $cssUrl;

    public function __construct(UserInterfaceGateway $ui)
    {
        $this->lessUrl = __DIR__ . '/../../UserInterface/Less';
        $this->cssUrl = CHAT_ROOT . 'Public/Styles';
        $this->userInterface = $ui;
    }

    public function present(array $information)
    {
        $this->compileCss();

        $this->userInterface->render('index', array(
            'pageTitle' => 'Se7enChat',
            'cssUrl' => PUBLIC_ROOT . '/Styles',
            'javascriptUrl' => PUBLIC_ROOT . '/Scripts',
            'imageUrl' => PUBLIC_ROOT . '/Images',
            'userName' => 'Francisco',
            'rooms' => array(
                array('name' => 'Room 1'),
                array('name' => 'Room 2', 'selected' => 'selected')
            )
        ));
    }

    private function compileCss()
    {
        $less = new \lessc;
        $less->checkedCompile(
            $this->lessUrl . '/index.less', $this->cssUrl . '/index.css');
    }
}
