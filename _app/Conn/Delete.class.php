<?php
require_once('Conn.class.php');
require_once('ClassInterface.class.php');

class Delete extends Conn {
	private $Connect = null;
	private $Entity;

	public function __construct(ClassInterface $entity){
		$this->Entity = $entity;
	}

	public function Delete(){
		$query = "DELETE FROM {$this->Entity->getTable()} WHERE id = :id";
		$conn = $this->setConnect($this->getConn()); //Connection
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id',$this->Entity->getIdClient());
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