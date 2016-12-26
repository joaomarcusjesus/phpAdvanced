<?php

require_once("../vendor/autoload.php");
require_once("config.php");
require_once("service.php");
use \Source\Product;

$product = new Product;

$product->setName("Jominha")->setDescription("Show de bola!");

$show 	= $container['ServiceProduct']->show();
$search = $container['ServiceProduct']->search(3);
$save 	= $container['ServiceProduct']->save();
$update = $container['ServiceProduct']->update();
$delete = $container['ServiceProduct']->delete(3);

var_dump($search);
var_dump($show);
var_dump($save);
var_dump($update);

//require_once("list.product.php");