<?php
require_once(LIB_PATH.DS."config.php");
class Database {
	var $sql_string = '';
	var $error_no = 0;
	var $error_msg = '';
	var $query = '';
	public $conn;
	public $last_query;
	private $magic_quotes_active;
	private $real_escape_string_exists;
	
	function __construct() {
		$this->open_connection();
		// $this->magic_quotes_active = get_magic_quotes_gpc();
		$this->real_escape_string_exists = function_exists("mysql_real_escape_string");
	}
	
	public function open_connection() {
		try {
		$this->conn = new PDO("mysql:host=".server.";dbname=".database_name. "", user,pass);
		// set the PDO error mode to exception
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "Connected successfully";
		}catch(PDOException $e){
			echo "Problem in database connection! Contact administrator!". $e->getMessage();
		
		}

	}
	
	function InsertThis($sql='') {
		$this->sql_string=$sql;
		$this->query = $this->conn->prepare($this->sql_string);
		
		if($this->query->execute()) {
	   	 	return true;
	 	 } else {
	    	return false;
	  	}
	}
	
	function setQuery($sql='') {
		try {
		   $this->sql_string=$sql;
			$this->query = $this->conn->prepare($this->sql_string);
			$this->query->execute();

		  } catch (PDOException $e) {
		    echo "Failed to get query handle: " . $e->getMessage() . "\n";
		    exit;
		  }
		
	}
	// function executeQuery(){
	// 	try{
	// 		$this->query->execute();

	// 	 } catch (PDOException $e) {
	// 	    echo "Failed to get query handle: " . $e->getMessage() . "\n";
	// 	    exit;
	// 	  }	
	// }

	// function executeQuery($query, $params = array()) {
		public function executeQuery($query, $params = array()) {
			try {
				$stmt = $this->conn->prepare($query);
				$stmt->execute($params);
				return $stmt;
			} catch (PDOException $e) {
				echo "Failed to execute query: " . $e->getMessage();
				exit;
			}
		}
		
	

	function loadResultList() {
		
		$results = $this->query->fetchAll(PDO::FETCH_OBJ);
		return $results;
	}	
	function loadSingleResultAssoc() {
		
		$results = $this->query->fetch(PDO::FETCH_ASSOC);
		return $results;
	}	
	
	// public function num_rows() {
	// 	return $this->query->rowCount();
	// }

	public function num_rows($result) {
		return $result->rowCount();
	}
	

	function loadSingleResult() {
		
		$results = $this->query->fetch(PDO::FETCH_OBJ);
		return $results;
	}
	
	function getFieldsOnOneTable( $tbl_name ) {
	
		$this->setQuery("DESC ".$tbl_name);
		$rows = $this->loadResultList();
		
		$f = array();
		for ( $x=0; $x<count( $rows ); $x++ ) {
			$f[] = $rows[$x]->Field;
		}
		
		return $f;
	}	

	public function fetch_array($result) {
		return mysqli_fetch_array($result);
	}
	//gets the number or rows	

	public function insert_id() {
    // get the last id inserted over the current db connection
		return $this->conn->lastInsertId();
	}
  
	public function affected_rows() {
		return mysqli_affected_rows($this->conn);
	}
	
	 public function escape_value( $value ) {
		// if( $this->real_escape_string_exists ) { // PHP v4.3.0 or higher
		// 	// undo any magic quote effects so mysql_real_escape_string can do the work
		// 	if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
		// 	$value = $this->conn->quote( $value );
		// } else { // before PHP v4.3.0
		// 	// if magic quotes aren't already on then add slashes manually
		// 	if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
		// 	// if magic quotes are active, then the slashes already exist
		// }
		return $value;
   	}
	
	public function close_connection() {
		$conn = null;
	}
	
	
function getLastInsertId() {
	global $mydb;

	// Check if the database connection is an instance of mysqli
	if ($mydb->conn instanceof mysqli) {
		return $mydb->conn->insert_id;
	}

	// Check if the database connection is an instance of PDO
	if ($mydb->conn instanceof PDO) {
		return $mydb->conn->lastInsertId();
	}

	// Return null or handle other database libraries if needed
	return null;
}

} 
$mydb = new Database();


?>
