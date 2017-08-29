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
	*@param type string field
	*use "," for separate indexes	
	*/
	public function Read($field,$query = null){
		if(is_array($field)):
			$field = implode("," , $field);
		$this->Query = "SELECT {$field} FROM `{$this->Table}` {$query}";
		else:
			$field = $field;
		$this->Query = "SELECT {$field} FROM `{$this->Table}` {$query}";
		endif;
		$conn = $this->setConnect($this->getConn()); //Connection
		$stmt = $conn->query($this->Query); //Execute Query
		$this->Return = $stmt->fetchAll(PDO::FETCH_ASSOC); // Data Return
		return $this->Return;
	}

	/**
	*<b>FullRead</b>
	*Method for registers list all fields 
	*parameters for type string.
	*@param type string query
	*/
	public function FullRead($query = null){
		$this->Query = "SELECT * FROM {$this->Table} {$query}";
		$conn = $this->setConnect($this->getConn()); //Connection
		$stmt = $conn->query($this->Query); //Execute Query
		$this->Return = $stmt->fetchAll(PDO::FETCH_ASSOC); // Data Return
		return $this->Return;
	}

	public function FindOut(){
		
	}
	private function setConnect(PDO $conn){
		$this->Connect = $conn;
		return $this->Connect;
	}

	public function dm(){
		return $this;
	}
}
?>