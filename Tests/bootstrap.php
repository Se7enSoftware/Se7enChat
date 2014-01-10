<?php
define('CHAT_ROOT', __DIR__ . '/../');
define('TEST_ROOT', __DIR__ . '/');
define('SCRIPT', 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME']);
define('PUBLIC_ROOT', ''); // There is no public root to speak of when testing.

// Require Composer included dependencies.
require CHAT_ROOT . 'vendor/autoload.php';
