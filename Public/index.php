<?php
use Se7enChat\Libraries\Autoloader\Autoloader;
use Se7enChat\Libraries\Router\Router;

require_once '../Libraries/Autoloader/Autoloader.php';
require_once '../vendor/autoload.php';
$autoloader = new Autoloader(__DIR__ . '/../../');
$autoloader->load();

\Se7enChat\Libraries\Web\Controllers\IndexController::selfInit();
