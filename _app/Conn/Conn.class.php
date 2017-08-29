<?php
class Conn{

	private $Connect = null;

	private $host = HOST;
	private $user = USER;
	private $pass = PASS;
	private $dbsa = DBSA;

	private function conectar(){
		try{
			$conn = new PDO("mysql:host={$this->host};dbname={$this->dbsa}","{$this->user}","{$this->pass}");
			$this->Connect = $conn;
		}catch(PDOException $e){
			die($e->getCode());
		}
		return $this->Connect;
	}
	
	public function getConn(){
		return $this->conectar();
	}
}
?>