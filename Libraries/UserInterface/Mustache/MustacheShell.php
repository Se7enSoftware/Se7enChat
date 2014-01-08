<?php
namespace Se7enChat\Libraries\UserInterface\Mustache;
use Se7enChat\Gateways\UserInterfaceGateway;

class MustacheShell implements UserInterfaceGateway
{
    public function __construct()
    {
        $templateDirectory = sprintf('%s/Templates', __DIR__);
        $partialsDirectory = sprintf('%s/Templates/Partials', __DIR__);
        $this->engine = new \Mustache_Engine(array(
            'loader' => new \Mustache_Loader_FilesystemLoader($templateDirectory),
            'partials_loader' => new \Mustache_Loader_FilesystemLoader($partialsDirectory)
        ));
    }

    public function render($template, array $params)
    {
        echo $this->engine->render($template, $params);
    }
}
