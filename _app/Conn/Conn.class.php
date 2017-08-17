<?php

class Conn{

	private $Conect = null;

	private $host = HOST;
	private $user = USER;
	private $pass = PASS;
	private $dbsa = DBSA;

	private function conectar(){
		try{
			$conn = new PDO("mysql:host={$this->host};dbname={$this->dbsa}","{$this->user}","{$this->pass}");
		}catch(PDOException $e){
			die($e->getCode());
		}
		return $this->Conect = $conn;
	}
	
	public function getConn(){
		return $this->conectar();
	}
}
?>