<?php
require('db/db.php');

class dbHandler {
	protected $con;

	public function __construct(){

		$this->con = db::getInstance();
		if(!$this->con){
			exit('Database connection error');
		}
	}

	public function do_my_query($query, $params = [])
	{
		$to_return = 1;
	    try {
	      $stmt = $this->con->prepare($query);

	      foreach ($params as $key => &$value) {
	        $stmt->bindParam($key, $value);
	      }

	      $stmt->execute();
	    } catch (PDOException $e) {

	    	throw new Exception($e->getMessage());
	    }

	    if (strpos($query, "SELECT") !== false) {
	      if (substr($query, -7) == "LIMIT 1") {
	        // single object
	        try {
	          $to_return = $stmt->fetch(PDO::FETCH_OBJ);
	        } catch(PDOException $e) {
	        	throw new Exception($e->getMessage());
	        }
	      } else {
	        // array of objects
	        try {
	          $to_return = $stmt->fetchAll(PDO::FETCH_OBJ);
	        } catch (PDOException $e) {
	        	throw new Exception($e->getMessage());
	        }
	      }
	    } else if (strpos($query, "INSERT") !== false) {
	      // id in object
	      try {
	        $to_return = $this->con->lastInsertId();
	      } catch (PDOException $e) {

	      	throw new Exception($e->getMessage());
	      }
	    } else if (strpos($query, "UPDATE") !== false) {
	      // true
	    } else if (strpos($query, "DELETE") !== false) {
	      // true
	    }

	    return $to_return;
	}


}
