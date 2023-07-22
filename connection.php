<?php

/*==MYSQLI Object Oriented==*/
class db{
		protected $connection;
	
		public function __construct(){
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$db	  =	'task';
			$this->connection = mysqli_connect($host,$user,$pass,$db);
			if(!$this->connection){
				die('Connection Error'.mysqli_connect_error($this->connection));
			}
		}
	
}


?>
