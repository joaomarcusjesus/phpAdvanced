<?php 

namespace Source;

use Source\IProduct;
use Source\IConn;


class ServiceProduct implements IServiceProduct{

	private $dbname;
	private $product;

	public function __construct(IConn $dbname, IProduct $product){

		$this->dbname = $dbname->connect();
		$this->product = $product;
	}

	public function show(){

		$query = "SELECT * FROM `products`";
		$statment = $this->dbname->prepare($query);
		$statment->execute();

		return $statment->fetchAll(\PDO::FETCH_ASSOC);	

	}
	public function save(){

		$query = "INSERT INTO `products`(`name`, `description`) VALUES (:name,:description)";
		$statment = $this->dbname->prepare($query);
		$statment->bindValue(":name",$this->product->getName());
		$statment->bindValue(":description",$this->product->getDescription());
		$statment->execute();

		return $this->dbname->lastInsertId();
	}
	public function search($id){

		$query = "SELECT * FROM `products` WHERE `id` = :id";
		$statment = $this->dbname->prepare($query);
		$statment->bindValue(":id",$id);
		$statment->execute();

		return $statment->fetch(\PDO::FETCH_ASSOC);

	}
	public function update(){

		$query = "UPDATE `products` SET `name` = ?, `description` = ? WHERE `id` = ?";
		$statment = $this->dbname->prepare($query);
		$statment->bindValue(1,$this->product->getName());
		$statment->bindValue(2,$this->product->getDescription());
		$statment->bindValue(3,$this->product->getId());
		$result = $statment->execute();

		return $result;
	}
	public function delete($id){

		$query = "DELETE FROM `products` WHERE `id` = :id";
		$statment = $this->dbname->prepare($query);
		$statment->bindValue(":id",$id);
		$result = $statment->execute();

		return $result;

	}
}