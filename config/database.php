<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
'driver'    => env('DB_CONNECTION', 'mysql'),
'host'      => env('DB_HOST', 'localhost'),
'port'      => env('DB_PORT', '3306'),
'database'  => env('DB_DATABASE', 'saeed'),
'username'  => env('DB_USERNAME', 'root'),
'password'  => env('DB_PASSWORD', ''),
'charset'   => 'utf8mb4',
'collation' => 'utf8mb4_unicode_ci',
'prefix'    => '',
'strict'    => false,
'engine'    => null,
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();