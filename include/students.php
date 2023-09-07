<?php
require_once(LIB_PATH.DS.'database.php');
class Student {
	protected static  $tblname = "scholar_info";

	function dbfields () {
		global $mydb;
		return $mydb->getfieldsononetable(self::$tblname);

	}
	function listofstudents(){
		global $mydb;
		$mydb->setQuery("SELECT * FROM ".self::$tblname);
		return $cur;
	}
	function find_students($id="",$email=""){
		global $mydb;
		$mydb->setQuery("SELECT * FROM ".self::$tblname." 
			WHERE scholar_id = {$id} OR email = '{$email}'");
		
		$row_count = $mydb->num_rows();
		return $row_count;
	}

	function find_all_students($user=""){
		global $mydb;
		$mydb->setQuery("SELECT * FROM ".self::$tblname." 
			WHERE user_id = '{$user}'");
		
		$row_count = $mydb->num_rows();
		return $row_count;
	}

	 
	function single_students($id=""){
			global $mydb;
			$mydb->setQuery("SELECT * FROM ".self::$tblname." 
				Where scholar_id= '{$id}' LIMIT 1");
			$cur = $mydb->loadSingleResult();
			return $cur;
	}
		 
	function single_student_userid($id=""){
		global $mydb;
		$mydb->setQuery("SELECT * FROM ".self::$tblname." 
			Where user_id = '{$id}' LIMIT 1");
		$cur = $mydb->loadSingleResult();
		return $cur;
}
	/*---Instantiation of Object dynamically---*/
	static function instantiate($record) {
		$object = new self;

		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		} 
		return $object;
	}
	
	
	/*--Cleaning the raw data before submitting to Database--*/
	private function has_attribute($attribute) {
	  // We don't care about the value, we just want to know if the key exists
	  // Will return true or false
	  return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes() { 
		// return an array of attribute names and their values
	  global $mydb;
	  $attributes = array();
	  foreach($this->dbfields() as $field) {
	    if(property_exists($this, $field)) {
			$attributes[$field] = $this->$field;
		}
	  }
	  return $attributes;
	}
	
	protected function sanitized_attributes() {
	  global $mydb;
	  $clean_attributes = array();
	  // sanitize the values before submitting
	  // Note: does not alter the actual value of each attribute
	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $mydb->escape_value($value);
	  }
	  return $clean_attributes;
	}
	
	// function checkEmailExists($email) {
	// 	global $mydb;
	
	// 	$email = $mydb->escape_value($email);
	// 	$query = "SELECT COUNT(*) AS count FROM scholar_info WHERE email = '{$email}'";
	// 	$result = $mydb->executeQuery($query);
	
	// 	if ($result && $mydb->num_rows($result) > 0) {
			
	// 		$row = $mydb->fetch_assoc($result);
	// 		return $row['count'] > 0;
	// 	}
	
	// 	return false;
	// }
	
	function find_user_by_email($email) {
		global $mydb;
	
		$mydb->setQuery("SELECT * FROM ".self::$tblname." WHERE email = '{$email}'");
	
		$row_count = $mydb->num_rows();
		return $row_count;
	}
	

	/*--Create,Update and Delete methods--*/
	public function save() {
	  // A new record won't have an id yet.
	  return isset($this->id) ? $this->update() : $this->create();
	}
	
	public function create() {
		global $mydb;
		$attributes = $this->sanitized_attributes();
    
		// Check if email already exists
		$existingEmail = $this->find_students("", $attributes['email']);
		if ($existingEmail > 0) {
			message ("Email already exists"); 
			return false; // Return false to indicate duplicate email
		}
		$sql = "INSERT INTO ".self::$tblname." (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
		
	 if($mydb->setQuery($sql)) {	
	    return true;
	  } else {
	    return false;
	  }

	
	}

	public function update($id="") {
	  global $mydb;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".self::$tblname." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE scholar_id='". $id."'";
	  
	 	if(!$mydb->setQuery($sql)) return false; 	
		
	}

	public function delete($id=0) {
		global $mydb;
		  $sql = "DELETE FROM ".self::$tblname;
		  $sql .= " WHERE scholar_id=". $id;
		  $sql .= " LIMIT 1 ";
		  
		  
			if(!$mydb->setQuery($sql)) return false; 	
	
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
?>