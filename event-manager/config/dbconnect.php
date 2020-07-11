<?php
/**
 * Database Connection File
 */
class Dbconnect
{
	private $server     = 'localhost';
	private $username  	= 'root';
	private $password	= '';
	private $dbname		= 'event';
	private  $db;

	function dbmsConnect()
	{
		$this->db = new mysqli($this->server, $this->username, $this->password,$this->dbname);
		if(!$this->db)
		{
			die('error : '.mysqli_connect_error());
		}
		return $this->db;
	}
}

?>