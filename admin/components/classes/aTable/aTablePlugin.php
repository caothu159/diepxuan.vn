<?php

/**
 *
 */
class aTablePlugin extends AnotherClass {

	static function TableColumn($tbName) {
		return Database::DatabaseTableColumns($tbName);
	}
}