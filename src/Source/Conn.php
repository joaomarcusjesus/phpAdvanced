<?php

namespace Source;

use Source\IConn;

class Conn implements IConn{

	private $Host;
	private $Dbname;
	private $Username;
	private $Password;


	public function __construct($Host,$Dbname,$Username,$Password){

		$this->host 	= $Host;
		$this->dbname 	= $Dbname;
		$this->username = $Username;
		$this->password = $Password;


	}

	public function connect(){

		try{

			return new \PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username,$this->password);

		}catch(PDOException $e){
			echo "Error ao conectar ao banco de dados!<br><b>Tipo de erro: {$e->getMessage()}</b><br><small>Na linha: {$e->getCode()}</small>";
			exit;
		}

	}

}