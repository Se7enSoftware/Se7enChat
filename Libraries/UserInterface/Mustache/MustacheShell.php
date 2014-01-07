<?php
namespace Se7enChat\Libraries\UserInterface\Mustache;
use Se7enChat\Gateways\UserInterfaceGateway;

class MustacheShell implements UserInterfaceGateway
{
    public function __construct()
    {
        $this->engine = new \Mustache_Engine;
    }

    public function render($template, array $params)
    {
        echo $this->engine->render($template, $params);
    }
}
