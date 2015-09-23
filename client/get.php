<?php

$dbdriver = "mysql";
$dbserver = "localhost";
$dataname = "diepxuan_vn";
//$dsn = 'mysql:host=localhost;dbname=diepxuan_vn;charset=utf8';
$username = "root";
$password = "877611";
$options = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_EMULATE_PREPARES => false
);

//$dbh = new PDO($dsn, $username, $password, $options);

try {
	$dbh = new PDO("$datatype:host=$database;dbname=$dataname", $username, $password, $options);
	// set the PDO error mode to exception
//	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//	$sql = "CREATE DATABASE myDBPDO";
	// use exec() because no results are returned
//	$conn->exec($sql);
//	echo "Database created successfully<br>";
//	$dbh = null;
	unset($dbh);
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}

