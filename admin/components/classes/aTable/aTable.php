<?php

/**
 *
 */
class aTable extends aTablePlugin {

	static function TableGetAll($tbName) {
		return Database::DatabaseTableSelectRows($tbName);
	}

	static function TableDelete($tbName, $data) {
		return Database::DatabaseTableDelete($tbName, $data);
	}

	static function TableEdit($tbName, $data) {
		return Database::DatabaseTableInsert($tbName, $data);

	}

	static function TableNew($tbName, $data) {
		return Database::DatabaseTableInsert($tbName, $data);
	}
}