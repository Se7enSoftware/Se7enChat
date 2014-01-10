<?php
use Se7enChat\Libraries\Autoloader\Autoloader;
use Se7enChat\Libraries\Router\Router;
use Se7enChat\Libraries\Web\Controllers\IndexController;
use Se7enChat\Interactors\IndexInteractor;

define('CHAT_ROOT', __DIR__ . '/../');
define('SCRIPT', 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME']);
define('PUBLIC_ROOT', str_replace('index.php', '', SCRIPT));

require_once '../vendor/autoload.php';

$controller = new IndexController(
    new IndexInteractor);
$controller->main();
