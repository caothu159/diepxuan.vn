<?php

/**
 *
 */
class DatabaseTables extends DatabaseTable {

	static function DatabaseTablesNames() {
		return static::$dbhash->query(
			'SELECT DISTINCT `TABLE_NAME` '
			. 'FROM `INFORMATION_SCHEMA`.`COLUMNS` '
			. 'WHERE TABLE_SCHEMA=\'' . Config::$dataname . '\';'
		)->fetchAll(PDO::FETCH_COLUMN);
	}
}