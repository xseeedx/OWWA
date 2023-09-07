<?php
require_once(LIB_PATH.DS.'database.php');
// SELECT `ANNOUNCEMENTID`, `ANNOUNCEMENT_TEXT`, `ANNOUNCEMENT_WHAT`, `ANNOUNCEMENT_WHEN`, `ANNOUNCEMENT_WHERE` FROM `tblannouncement` WHERE 1
class Announcement {
	protected static  $tblname = "announcement";
	public $id; // Add the id property
	function dbfields () {
		global $mydb;
		return $mydb->getfieldsononetable(self::$tblname);

	}
	function listofannouncement(){
		global $mydb;
		$mydb->setQuery("SELECT * FROM ".self::$tblname);
		// $cur = $mydb->loadResultList();
		return $cur;
	}
	function find_announcement($id="",$when=""){
		global $mydb;
		$mydb->setQuery("SELECT * FROM ".self::$tblname." 
			WHERE id_announcement = {$id} OR ANNOUNCEMENT_WHEN = '{$when}'");
		// $cur = $mydb->executeQuery();
		$row_count = $mydb->num_rows();
		return $row_count;
	} 

	function find_all_announcement($when=""){
		global $mydb;
		$mydb->setQuery("SELECT * FROM ".self::$tblname." 
			WHERE date_posted = '{$when}'");
		// $cur = $mydb->executeQuery();
		$row_count = $mydb->num_rows();
		return $row_count;
	}
	 
	function single_announcement($id=""){
			global $mydb;
			$mydb->setQuery("SELECT * FROM ".self::$tblname." 
				Where id_announcement= '{$id}' LIMIT 1");
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
		$sql .= " WHERE id_announcement=". $id;
	 
	 	if(!$mydb->InsertThis($sql)) return false; 	
		
	}

	public function delete($id=0) {
		global $mydb;
		  $sql = "DELETE FROM ".self::$tblname;
		  $sql .= " WHERE id_announcement=". $id;
		  $sql .= " LIMIT 1 ";
		 
		  
			if(!$mydb->InsertThis($sql)) return false; 	
	
	}	

	function sendMail($cont=[]) {
		// print_r($cont);
		if(mail($cont['mail'],$cont['subject'],$cont['msg'],$cont['enty'])) {

		}
		else {
			echo "Email sending failed.....";
		}
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