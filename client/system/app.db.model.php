<?php

class Dmodel {

	public $table_name;
	public $id;

	public function __construct($table, $columns) {
		$this->table_name = $table;
		$this->id = 0;
		global $app_db;
		try {
			$app_db->exec("CREATE TABLE IF NOT EXISTS $table ($columns) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;");
		} catch (PDOException $e) {
			$app->debug("MYSQL ERROR: " . $e->getMessage());
			die();
		}
	}

	public function delete($id) {
		global $app_db;
		try {
			if ($id != NULL) {
				$app_db->exec("DELETE FROM $this->table_name WHERE `id`={$id};");
			} else {
				$app_db->exec("DELETE FROM $this->table_name WHERE `id`={$this->id};");
			}
		} catch (PDOException $e) {
			$app->debug("MYSQL ERROR: " . $e->getMessage());
			die();
		}
	}

}
