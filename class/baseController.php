<?php

class baseController
{
	private $host = "localhost";
	private $db_user = "root";
	private $db_password = "";
	private $db_name = "portal";
	protected $db;

	function __construct()
	{
		try {
			$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name.';charset=utf8',$this->db_user, $this->db_password, [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
		} catch (PDOException $e) {
			exit('Problem z bazą danych');
		}
	}
	
	function sendAjax(array $ajax)
	{
       header('Content-Type: application/json');
       echo json_encode($ajax);
       exit;
	}
}