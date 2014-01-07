<?php
namespace Se7enChat\Gateways;

interface UserInterfaceGateway
{
    public function render($template, array $data);
}
