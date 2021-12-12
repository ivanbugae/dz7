<?php


use Db\QueryBuilder;

ini_set('display_errors', 1);
include "../vendor/autoload.php";

$builder = new QueryBuilder();
$builder->table('nova_ordered_carts')
    ->select(['orderID','name','price'])
    ->limit('10');
$query = $builder->build();

$db = new Db('','','',''); //Необходимо указать данные подключения
$result = $db->all($query);