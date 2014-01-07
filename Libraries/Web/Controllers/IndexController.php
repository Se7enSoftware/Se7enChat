<?php
namespace Se7enChat\Libraries\Web\Controllers;
use Se7enChat\Boundaries\IndexInputPort;
use Se7enChat\Boundaries\IndexOutputPort;

class IndexController
{
    private $inputPort;
    private $outputPort;

    public function __construct(
        IndexInputPort $inputPort, IndexOutputPort $outputPort)
    {
        $this->inputPort = $inputPort;
        $this->outputPort = $outputPort;
    }

    public function main()
    {
        $this->inputPort->setOutputPort(
            $this->outputPort);
        $this->inputPort->main(array());
    }
}
