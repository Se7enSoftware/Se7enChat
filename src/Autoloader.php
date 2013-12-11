<?php
namespace Se7enChat\src;

class Autoloader
{
    private $projectRoot;

    public function __construct($projectRoot)
    {
        $this->projectRoot = $projectRoot;
    }

    public function load()
    {
        spl_autoload_register(function($className)
        {
            require $this->projectRoot . str_replace('\\', '/', $className . '.php');
        });
    }
}
