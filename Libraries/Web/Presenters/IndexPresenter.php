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

        $this->compileCss();
    }

    public function present(array $information)
    {
        $this->userInterface->render('index', array(
            'pageTitle' => 'Se7enChat',
            'cssUrl' => PUBLIC_ROOT . '/Styles',
            'imageUrl' => PUBLIC_ROOT . '/Images',
            'userName' => 'Se7enChat',
            'rooms' => array(
                array('name' => 'Room 1'),
                array('name' => 'Room 2', 'selected' => 'selected')
            ),
            'posts' => array(
                array(
                    'userName' => 'Se7enChat',
                    'timestamp' => 'Sunday Dec. 22 2013, 9:06:57',
                    'body' => $this->getRawText()
                ),
                array(
                    'userName' => 'Se7enChat',
                    'timestamp' => 'Sunday Dec. 22 2013, 9:06:57',
                    'body' => $this->getRawText()
                ),
                array(
                    'userName' => 'Se7enChat',
                    'timestamp' => 'Sunday Dec. 22 2013, 9:06:57',
                    'body' => $this->getRawText()
                ),
                array(
                    'userName' => 'Se7enChat',
                    'timestamp' => 'Sunday Dec. 22 2013, 9:06:57',
                    'body' => $this->getRawText()
                ),
                array(
                    'userName' => 'Se7enChat',
                    'timestamp' => 'Sunday Dec. 22 2013, 9:06:57',
                    'body' => $this->getRawText()
                )
            )
        ));
    }

    private function compileCss()
    {
        $less = new \lessc;
        $less->checkedCompile(
            $this->lessUrl . '/index.less', $this->cssUrl . '/index.css');
    }

    private function getRawText()
    {
        return 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent consectetur nunc eros, ut iaculis ipsum ullamcorper fermentum. Morbi vel dolor nec urna auctor dignissim. Nullam vitae porta erat. Praesent id tempor erat, non consequat velit. Duis cursus lorem magna, id lobortis orci suscipit ut. Mauris aliquet metus non tincidunt consequat. Pellentesque egestas pulvinar placerat. Donec quis odio diam. Proin at.';
    }
}
