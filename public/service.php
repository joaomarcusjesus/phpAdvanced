<?php 

require_once("../vendor/autoload.php");

use \Source\Conn;
use \Source\Product;
use \Source\ServiceProduct;


$container['conn'] = function($argument){
	return new Conn($argument['host'],$argument['db'],$argument['user'],$argument['password']);
};

$container['product'] = function(){
	return new Product;
};

$container['ServiceProduct'] = function($argument){
	return new ServiceProduct($argument['conn'],$argument['product']);
};

?>