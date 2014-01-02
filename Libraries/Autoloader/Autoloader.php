<?php
namespace Se7enChat\Libraries\Autoloader;

class Autoloader
{
    private $projectRoot;

    public function __construct($projectRoot)
    {
        $this->projectRoot = $projectRoot;
    }

    public function load()
    {
        spl_autoload_register(array($this, 'requireFile'));
    }

    private function requireFile($className)
    {
        $path = sprintf('%s%s.php',
            $this->projectRoot, str_replace('\\', '/', $className));
        if (preg_match('/^Se7enChat/', $className) && !class_exists($className)) {
            require $path;
        }
    }
}
