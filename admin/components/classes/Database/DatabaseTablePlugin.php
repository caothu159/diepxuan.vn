<?php

/**
 *
 */
class DatabaseTablePlugin extends AnotherClass {

	static function DatabaseTableColumns($tbName, $width_ID = FALSE) {
		return
		static::$dbhash->query(
			'SELECT `COLUMN_NAME` '
			. 'FROM `INFORMATION_SCHEMA`.`COLUMNS` '
			. 'WHERE `TABLE_SCHEMA`=\'' . Config::$dataname . '\' '
			. 'AND `TABLE_NAME`=\'' . $tbName . '\''
			. ($width_ID ? ';' : 'AND `COLUMN_NAME`<>\'id\';')
		)->fetchAll(PDO::FETCH_COLUMN);
	}

	public static function DatabaseTableReferences($tbName) {
		return
		static::$dbhash->query(
			'SELECT `COLUMN_NAME`, `REFERENCED_TABLE_NAME` '
			. 'FROM `INFORMATION_SCHEMA`.`KEY_COLUMN_USAGE` '
			. 'WHERE `TABLE_NAME`=\'' . $tbName . '\' '
			. 'AND `REFERENCED_COLUMN_NAME` = \'id\';'
		)->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function DatabaseTableType($tb_name, $value = FALSE, $id = '0') {
		$columns_ref = static::DatabaseTableReferences($tb_name);
		$columns = static::$dbhash->query(
			'SELECT `COLUMN_NAME`, `DATA_TYPE` '
			. 'FROM `INFORMATION_SCHEMA`.`COLUMNS` '
			. 'WHERE `TABLE_SCHEMA`=\'' . Config::$dataname . '\' '
			. 'AND `TABLE_NAME` = \'' . $tb_name . '\' '
			. 'AND `COLUMN_NAME`<>\'id\';'
		)->fetchAll(PDO::FETCH_ASSOC);

		$row = array();
		if ($value) {
			$row = static::DatabaseTableSelectRow($tb_name, $id);
		}

		for ($i = 0, $c = count($columns); $i < $c; $i++) {
			for ($j = 0, $d = count($columns_ref); $j < $d; $j++) {
				if ($columns[$i]['COLUMN_NAME'] === $columns_ref[$j]['COLUMN_NAME']) {
					$columns[$i]['DATA_TYPE'] =
					static::$dbhash->query(
						'SELECT `id`, `name` '
						. 'FROM `' . $columns_ref[$j]['REFERENCED_TABLE_NAME'] . '`;'
					)->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			if (array_key_exists($columns[$i]['COLUMN_NAME'], $row)) {
				$columns[$i]['COLUMN_VALUE'] = $row[$columns[$i]['COLUMN_NAME']];
			} else {
				$columns[$i]['COLUMN_VALUE'] = '';
			}
		}

		return $columns;
	}

	static function DatabaseTableReindex($tbName) {
		$query = "ALTER TABLE $tbName AUTO_INCREMENT=1";
		$stmt = static::$dbhash->prepare($query);
		var_dump($stmt);
		return $stmt->execute();
	}
}