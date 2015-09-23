<?php

class Ddatabase {

	public $conn;
	public $username = "root";
	public $password = "877611";
	public $hostname = "localhost";
	public $dataname = "diepxuan_vn";

	public function __construct() {
		try {
			$this->conn = new PDO("mysql:host={$this->hostname}", $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "CREATE DATABASE IF NOT EXISTS {$this->dataname}";

			$this->conn->exec($sql)
					or die(print_r($this->conn->errorInfo(), true));
			$this->conn->query("use {$this->dataname}");
		} catch (PDOException $e) {
			out_debug("Unable to connect: " . $e->getMessage());
			die();
		}
	}

}

global $app_db;
$app_db = (new Ddatabase)->conn;
