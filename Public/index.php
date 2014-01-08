<?php
use Se7enChat\Libraries\Autoloader\Autoloader;
use Se7enChat\Libraries\Router\Router;
use Se7enChat\Libraries\Web\Controllers\IndexController;
use Se7enChat\Interactors\IndexInteractor;

require_once '../vendor/autoload.php';

$controller = new IndexController(
    new IndexInteractor);
$controller->main();
