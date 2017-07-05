<?php

class Client {

	private $db;
	private $idClient;
	private $nameClient;
	private $emailClient;

	public function __construct(\PDO $db){
		$this->db = $db;
	}

	public function Read(){

	}
	public function Create(){
		$query = "INSERT INTO clientes(nome,email) VALUES (:nome,:email)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':nome',$this->getNameClient());
		$stmt->bindValue(':email',$this->getEmailClient());		
		if($stmt->execute()):
			return true;
		endif;
	}
	public function Update(){

	}
	public function Delete(){

	}

	
	//Colocar (int) para forçar inteiro
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