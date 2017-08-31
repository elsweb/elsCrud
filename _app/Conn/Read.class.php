<?php
require_once('Conn.class.php');
class Read extends Conn {
	
	private $Connect = null;
	private $Query;
	private $Table;
	private $Return;

	function __construct($table, $query = null){
		$this->Table = $table;
		$this->Query = $query;
		return $this->Return;
	}
	/**
	*<b>Read</b>
	*Method for registers list on defined  fields 
	*parameters for type array and string.
	*@param type array field
	*@param type string field, use "," for separate indexes
	*@param type string query, for Clauses	
	*/
	public function Read($field = null,$query = null){
		if(!is_null($field)):
			if(is_array($field)):
				$field = implode("," , $field);
			$this->Query = "SELECT {$field} FROM `{$this->Table}` {$query}";
			else:
				$field = $field;
			$this->Query = "SELECT {$field} FROM `{$this->Table}` {$query}";
			endif;
			else:
				$this->Query = "SELECT * FROM `{$this->Table}` {$query}";
			endif;
		$conn = $this->setConnect($this->getConn()); //Connection
		$stmt = $conn->query($this->Query); //Execute Query
		$this->Return = $stmt->fetchAll(PDO::FETCH_ASSOC); // Data Return
		
	}
	/**
	*<b>FindOut</b>
	*Method for found registers list on defined  fields 
	*parameters for type array and string.
	*@param type array field
	*@param type string field, use "," for separate indexes
	*@param type string query, for Clauses	
	*/
	public function FindOut($find, $field = null, $query = null){
		if(!is_null($field)):
			if(is_array($field)):
				$field = implode("," , $field);
			$this->Query = "SELECT {$field} FROM `{$this->Table}` WHERE id = :id";
			else:
				$field = $field;
			$this->Query = "SELECT {$field} FROM `{$this->Table}` {$query}";
			endif;
			else:
				$this->Query = "SELECT * FROM `{$this->Table}` WHERE id = :id";
			endif;
		$conn = $this->setConnect($this->getConn()); //Connection
		$stmt = $conn->prepare($this->Query); //Execute Query
		$stmt->bindValue(":id",$find);
		$stmt->execute();
		$this->Return = $stmt->fetch(PDO::FETCH_ASSOC); // Data Return
		return $this->Return;
	}

	private function setConnect(PDO $conn){
		$this->Connect = $conn;
		return $this->Connect;
	}
}
?>