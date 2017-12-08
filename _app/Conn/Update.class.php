<?php
require_once('Conn.class.php');
require_once('ClassInterface.class.php');
class Update extends Conn{

	private $Connect = null;
	private $Entity;
	
	public function __construct(ClassInterface $entity){
		$this->Entity = $entity;
	}

	public function Update($id = null){
		$query = "UPDATE {$this->Entity->getTable()} SET nome = :nome, email = :email WHERE id = :id";
		$conn = $this->setConnect($this->getConn()); //Connection
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':nome',$this->Entity->getNameClient());
		$stmt->bindValue(':email',$this->Entity->getEmailClient());

		if(!is_null($id)):
			$stmt->bindValue(':id',$id);
		else:
			$stmt->bindValue(':id',$this->Entity->getId());
		endif;
		
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