<?php

global $app;

$columns = '`id` INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, `name` VARCHAR(50) NOT NULL';
$product = new Dmodel('product', $columns);
$app->model->product = $product;
$app->model->product->id = 0;
$app->model->product->name = "";
