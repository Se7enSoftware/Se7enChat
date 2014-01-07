<?php
namespace Se7enChat\Interactors;
use Se7enChat\Boundaries\IndexInputPort;
use Se7enChat\Boundaries\IndexOutputPort;

class IndexInteractor implements IndexInputPort
{
    private $outputPort;

    public function main(array $information)
    {
        $this->outputPort->present($information);
    }

    public function setOutputPort(IndexOutputPort $output)
    {
        $this->outputPort = $output;
    }
}
