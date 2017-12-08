<?php

class Client implements ClassInterface {

	
	private $tableClient = "clientes";
	private $idClient;
	private $nameClient;
	private $emailClient;
	
	//Colocar (int) para forçar inteiro
	public function setTable($tableClient){
		$this->tableClient = $tableClient;
		return $this;
	}

	public function setId($idClient){
		$this->idClient = $idClient;
		return $this;
	}

	public function setIdClient($idClient){
		$this->idClient = $idClient;
		return $this;
	}

	public function setNameClient($nameClient){
		$this->nameClient = $nameClient;
		return $this;
	}

	public function setEmailClient($emailClient){
		$this->emailClient = $emailClient;
		return $this;
	}

	public function getTable(){
		return $this->tableClient;
	}

	public function getId(){
		return $this->idClient;
	}


	public function getIdClient(){
		return $this->idClient;
	}

	public function getNameClient(){
		return $this->nameClient;
	}
	public function getEmailClient(){
		return $this->emailClient;
	}
}