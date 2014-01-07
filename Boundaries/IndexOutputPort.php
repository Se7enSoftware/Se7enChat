<?php
namespace Se7enChat\Boundaries;

interface IndexOutputPort
{
    public function render($template, array $information);
}
