<?php

class db {
	private function __construct(){}

	public static function getPDO(){
		$host		= "localhost";
		$username	= "root";
		$pass		= "";
		$dbname		= "citrus";

		$dsn = 'mysql:dbname='.$dbname.';host='.$host.';charset=UTF8';

		try {
			$connect = new PDO($dsn, $username, $pass);
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if($connect) {
				return $connect;
			}

		} catch (PDOException $e) {
			return false;
		}
	}

	public function close_connection(){

		$connect = self::getInstance();
		$connect = null;
	}

	public static function getInstance() {
		static $connect = false;

		if(!$connect){
			$connect = self::getPDO();
		}
		return $connect;
	}

}

