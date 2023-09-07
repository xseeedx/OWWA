<?php
require_once(LIB_PATH.DS.'database.php');
class User {
	protected static  $tblname = "user_acc";
	// public $id; // Add the id property
	function dbfields () {
		global $mydb;
		return $mydb->getfieldsononetable(self::$tblname);
	}
	function listofuser(){
		global $mydb;
		$mydb->setQuery("SELECT * FROM ".self::$tblname);
		// $cur = $mydb->loadResultList();
		return $cur;
	}
	function find_user($id="",$user_name=""){
		global $mydb;
		$mydb->setQuery("SELECT * FROM ".self::$tblname." 
			WHERE USERID = {$id} OR username = '{$user_name}'");
		$cur = $mydb->executeQuery();
		$row_count = $mydb->num_rows();
		return $row_count;
	}
	// static function userAuthentication($email,$h_pass){
	// 	global $mydb;
	// 	$mydb->setQuery("SELECT * FROM `user_acc` WHERE `username` = '". $email ."' and `account_password` = '". $h_pass ."'");
	// 	$cur = $mydb->executeQuery();
	 
	static function userAuthentication($email, $h_pass) {
		global $mydb;
		$query = "SELECT * FROM `user_acc` WHERE `username` = '".$email."' AND `account_password` = '".$h_pass."'";
		$mydb->setQuery($query);
		$cur = $mydb->executeQuery($query);
	
		$row_count = $mydb->num_rows($cur);
		// $row_count = $mydb->num_rows();//get the number of count
		 if ($row_count == 1){
		 $user_found = $mydb->loadSingleResult();
		 
		 if($user_found->account_status=='activate') {
		 	$_SESSION['USERID']   		= $user_found->USERID;
		 	$_SESSION['NAME']      		= $user_found->NAME;
		 	$_SESSION['username'] 		= $user_found->username;
		 	$_SESSION['account_password'] = $user_found->account_password;
		 	$_SESSION['TYPE'] 			= $user_found->TYPE;
		   return true;
			}else {
			$_SESSION['message'] = "This account is deactivate";
			return false;
		   }
		   
		 }else{
			
			$_SESSION['message'] = "Username and Password are incorrect! Please contact Administrator.";
		 	return false;
		 }
	}
	function single_user($id=""){
			global $mydb;
			$mydb->setQuery("SELECT * FROM ".self::$tblname." 
				Where USERID= '{$id}' LIMIT 1");
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
	
	/*--Create,Update and Delete methods--*/
	public function save() {
	  // A new record won't have an id yet.
	  return isset($this->id) ? $this->update() : $this->create();
	}
	
	public function create() {
		global $mydb;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$sql = "INSERT INTO ".self::$tblname." (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')"; 
	
	 if($mydb->InsertThis($sql)) {
		$this->id = $mydb->insert_id();
		return true;
	  } else {
		return false;
	  }
	}

	public function update($id=0) {
	  global $mydb;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".self::$tblname." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE USERID=". $id;
	  $mydb->setQuery($sql);
	 	if(!$mydb->executeQuery()) return false; 	
		
	}

	public function delete($id=0) {
		global $mydb;
		  $sql = "DELETE FROM ".self::$tblname;
		  $sql .= " WHERE USERID=". $id;
		  $sql .= " LIMIT 1 ";
		  $mydb->setQuery($sql);
		  
			if(!$mydb->executeQuery()) return false; 	
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