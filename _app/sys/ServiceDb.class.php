<?php

class ServiceDb {
	private $db;
	private $entity;

	public function __construct(\PDO $db, EntidadeInterface $entity){
		$this->db = $db;
		$this->entity = $entity;
	}

	public function FindOut($id){
		$query = "SELECT * FROM {$this->entity->getTable()} WHERE id=:id";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(":id",$id);
		$stmt->execute();
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}
	public function Read($order = null){
		if($order):
			$query = "SELECT * from {$this->entity->getTable()} ORDER BY {$order}";
		else:
			$query = "SELECT * from {$this->entity->getTable()}";
		endif;		
		$stmt = $this->db->query($query);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	public function Create(){
		$query = "INSERT INTO {$this->entity->getTable()} (nome,email) VALUES (:nome,:email)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':nome',$this->entity->getNameClient());
		$stmt->bindValue(':email',$this->entity->getEmailClient());		
		if($stmt->execute()):
			return true;
		endif;
	}
	public function Update($id){
		$query = "UPDATE {$this->entity->getTable()} SET nome = :nome, email = :email WHERE id = :id";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':nome',$this->entity->getNameClient());
		$stmt->bindValue(':email',$this->entity->getEmailClient());
		$stmt->bindValue(':id',$id);
		$resultado = $stmt->execute();
		if($resultado):
			return true;
		endif;
	}
	public function Delete($id){
		$query = "DELETE FROM {$this->entity->getTable()} WHERE id=:id";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(":id", $id);
		$resultado = $stmt->execute();
		if($resultado):
			return true;
		endif;
	}
}