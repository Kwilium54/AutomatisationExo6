<?php
require('../vendor/autoload.php');

use App\Config;

$config = Config::getInstance();

echo "=== Config ===" . PHP_EOL . PHP_EOL;
echo "apiKey : " . $config->get('apiKey') . PHP_EOL;
echo "debug  : " . ($config->get('debug') ? 'true' : 'false') . PHP_EOL;
echo "db host: " . $config->get('db')['host'] . PHP_EOL;

echo PHP_EOL;

$config2 = Config::getInstance();

echo "=== Vérification Singleton ===" . PHP_EOL . PHP_EOL;
echo '$config === $config2 : ';
var_dump($config === $config2);
