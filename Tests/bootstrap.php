<?php
define('CHAT_ROOT', __DIR__ . '/../');
define('TEST_ROOT', __DIR__ . '/');

// Require Composer included dependencies.
require CHAT_ROOT . 'vendor/autoload.php';

require CHAT_ROOT . 'Libraries/Autoloader/Autoloader.php';
$loader = new Se7enChat\Libraries\Autoloader\Autoloader(CHAT_ROOT . '../');
$loader->load();
