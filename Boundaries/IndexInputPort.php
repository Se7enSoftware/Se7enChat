<?php
namespace Se7enChat\Boundaries;

interface IndexInputPort
{
    public function main(array $data);
    public function setOutputPort(IndexOutputPort $output);
}
