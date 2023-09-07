<?php
require_once(LIB_PATH.DS.'database.php');
// comment.php
class Comment {
    protected static  $tblname = "comments";

        function dbfields () {
            global $mydb;
            return $mydb->getfieldsononetable(self::$tblname);
    
        }
        function listofcomments(){
            global $mydb;
            $mydb->setQuery("SELECT * FROM ".self::$tblname);
            return $cur;
        }
        function find_comments($id="",$when=""){
            global $mydb;
            $mydb->setQuery("SELECT * FROM ".self::$tblname." 
                WHERE comment_id = {$id} OR comment_create_at = '{$when}'");
            // $cur = $mydb->executeQuery();
            $row_count = $mydb->num_rows();
            return $row_count;
        } 
    
        function find_all_comments($when=""){
            global $mydb;
            $mydb->setQuery("SELECT * FROM ".self::$tblname." 
                WHERE comment_create_at = '{$when}'");
            // $cur = $mydb->executeQuery();
            $row_count = $mydb->num_rows();
            return $row_count;
        }
         
        function single_comments($id=""){
                global $mydb;
                $mydb->setQuery("SELECT * FROM ".self::$tblname." 
                    Where comment_id = '{$id}' LIMIT 1");
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
        return isset($this->id) ? $this->reply() : $this->create();
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