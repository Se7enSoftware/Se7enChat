<?php
define('CHAT_ROOT', __DIR__ . '/../');
define('TEST_ROOT', __DIR__ . '/');

require CHAT_ROOT . 'src/Autoloader.php';
$loader = new Se7enChat\src\Autoloader(CHAT_ROOT . '../');
$loader->load();
