<?php
use Se7enChat\Libraries\Autoloader\Autoloader;
use Se7enChat\Libraries\Router\Router;
use Se7enChat\Libraries\Web\Controllers\IndexController;
use Se7enChat\Interactors\IndexInteractor;

require_once '../Libraries/Autoloader/Autoloader.php';
require_once '../vendor/autoload.php';
$autoloader = new Autoloader(__DIR__ . '/../../');
$autoloader->load();

$controller = new IndexController(
    new IndexInteractor);
$controller->main();
