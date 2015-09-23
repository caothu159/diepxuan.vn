<?php

/**
 *
 */
class TablesMenuPluginFilter {

	static function TablesMenuPluginFilterNames() {
		return Database::DatabaseTablesNames();
	}
}