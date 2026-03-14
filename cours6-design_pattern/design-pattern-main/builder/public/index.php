<?php
require('../vendor/autoload.php');

use App\MySQLQueryBuilder;

$builder = new MySQLQueryBuilder();

$query1 = $builder
    ->select('id', 'name', 'email')
    ->from('users', 'u')
    ->where('u.age > 18')
    ->where('u.active = 1')
    ->orderBy('u.name')
    ->limit(10)
    ->getSQL();

echo $query1 . PHP_EOL;

$builder2 = new MySQLQueryBuilder();

$query2 = $builder2
    ->select('*')
    ->from('products')
    ->where('price < 100')
    ->getSQL();

echo $query2 . PHP_EOL;