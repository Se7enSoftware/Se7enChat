<?php
namespace Se7enChat\Libraries\Web\Builders;
use Se7enChat\Libraries\Web\Controllers\IndexController;
use Se7enChat\Interactors\IndexInteractor;

class ChatBuilder
{
    public function showChat()
    {
        $controller = new IndexController(
            new IndexInteractor);
        $controller->main();
    }
}
