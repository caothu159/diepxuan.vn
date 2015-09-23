<?php

class Config {

	public static $dbdriver = "mysql";
	public static $dbserver = "localhost";
	public static $dataname = "diepxuan_vn";
	public static $username = "root";
	public static $password = "877611";
	public static $dboption = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8\' COLLATE \'utf8_general_ci\'',
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_EMULATE_PREPARES => false,
	);

	public static $debug = 1;

}