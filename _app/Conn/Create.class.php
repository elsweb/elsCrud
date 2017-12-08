<?php
require_once('Conn.class.php');
require_once('ClassInterface.class.php');
class Create extends Conn {

	private $Connect = null;
	private $Entity;

	public function __construct(ClassInterface $entity){
		$this->Entity = $entity;
	}

	public function Create(){
		$query = "INSERT INTO {$this->Entity->getTable()} (nome,email) VALUES (:nome,:email)";
		$conn = $this->setConnect($this->getConn()); //Connection
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':nome',$this->Entity->getNameClient());
		$stmt->bindValue(':email',$this->Entity->getEmailClient());		
		if($stmt->execute()):
			return true;
		endif;
	}
	private function setConnect(PDO $conn){
		$this->Connect = $conn;
		return $this->Connect;
	}
	
}
?>