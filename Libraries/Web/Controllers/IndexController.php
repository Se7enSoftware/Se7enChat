<?php
namespace Se7enChat\Libraries\Web\Controllers;
use Se7enChat\Libraries\Web\Presenters\IndexPresenter;
use Se7enChat\Libraries\UserInterface\Mustache\MustacheShell;
use Se7enChat\Boundaries\IndexInputPort;

class IndexController
{
    private $inputPort;
    private $outputPort;

    public function __construct(IndexInputPort $inputPort)
    {
        $this->inputPort = $inputPort;
        $this->outputPort = new IndexPresenter(
            new MustacheShell);
    }

    public function main()
    {
        $this->inputPort->setOutputPort(
            $this->outputPort);
        $this->inputPort->main(array());
    }
}
