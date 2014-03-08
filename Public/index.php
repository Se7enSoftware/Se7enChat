<?php
use Se7enChat\Libraries\Autoloader\Autoloader;
use Se7enChat\Libraries\Router\Router;
use Symfony\Component\Yaml\Parser;

define('CHAT_ROOT', __DIR__ . '/../');
define('SCRIPT', 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME']);
define('PUBLIC_ROOT', str_replace('index.php', '', SCRIPT));

require_once '../vendor/autoload.php';

$yamlParser = new Parser();
$routes = $yamlParser->parse(file_get_contents('routes.yaml'));
$dependencies = $yamlParser->parse(file_get_contents('dependencies.yaml'));

$router = new Router($routes);
$router->setDependencies($dependencies);
try {
	$router->route($_GET);
} catch (Exception $error) {
	print ('Error: ' . $error->getMessage());
}

