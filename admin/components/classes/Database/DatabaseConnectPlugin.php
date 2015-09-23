<?php

/**
 *
 */
class DatabaseConnectPlugin extends DatabaseTables {

	static function Base() {
		try {
			static::$dbhash = new PDO(
				Config::$dbdriver . ':host=' . Config::$dbserver . ';dbname=' . Config::$dataname . ';charset=utf8'
				, Config::$username
				, Config::$password
				, Config::$dboption
			);
		} catch (PDOException $e) {
			Debug::Viewer('Error: ' . $e->getMessage());
		}
	}
}
