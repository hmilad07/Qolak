<?php

$default = [
    'driver' => 'mysql',
    'host' => getenv('DB_HOST') ?: 'localhost',
    'port' => getenv('DB_PORT') ?: '3306',
    'database' => getenv('DB_DATABASE') ?: '',
    'username' => getenv('DB_USERNAME') ?: '',
    'password' => getenv('DB_PASSWORD') ?: '',
    'charset' => 'utf8mb4',
];

$local = __DIR__ . '/database.local.php';

if (is_file($local)) {
    $override = require $local;
    return array_replace($default, is_array($override) ? $override : []);
}

return $default;
