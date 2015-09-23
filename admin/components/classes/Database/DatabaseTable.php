<?php

/**
 *
 */
class DatabaseTable extends DatabaseTablePlugin {

	public static function DatabaseTableSelectRows($tb_name) {
		$columns = static::DatabaseTableColumns($tb_name, TRUE);
		$columns_ref = static::DatabaseTableReferences($tb_name);
		$sql = 'SELECT ';
		for ($i = 0, $c = count($columns); $i < $c; $i++) {
			$flag = TRUE;
			for ($j = 0, $d = count($columns_ref); $j < $d; $j++) {
				if ($columns[$i] === $columns_ref[$j]['COLUMN_NAME']) {
					$REFERENCED_TABLE_NAME = $columns_ref[$j]['REFERENCED_TABLE_NAME'];
					$sql .= '(SELECT `name` FROM `' . $REFERENCED_TABLE_NAME . '` '
					. 'WHERE `' . $REFERENCED_TABLE_NAME . '`.`id` = `' . $tb_name . '`.`' . $columns[$i] . '`)'
					. ' AS `' . $REFERENCED_TABLE_NAME . '`, ';
					$flag = FALSE;
					break;
				}
			}
			$sql .= $flag ? '`' . $columns[$i] . '`, ' : '';
		}
		$query = trim($sql, ', ') . ' FROM `' . $tb_name . '` ORDER BY `id` ASC LIMIT 10;';
		return static::$dbhash->query($query)->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function DatabaseTableSelectRow($tb_name, $id = 0) {
		$columns = static::DatabaseTableColumns($tb_name, TRUE);
		$columns_ref = static::DatabaseTableReferences($tb_name);
		$sql = 'SELECT ';
		for ($i = 0, $c = count($columns); $i < $c; $i++) {
			$flag = TRUE;
			for ($j = 0, $d = count($columns_ref); $j < $d; $j++) {
				if ($columns[$i] === $columns_ref[$j]['COLUMN_NAME']) {
					$REFERENCED_TABLE_NAME = $columns_ref[$j]['REFERENCED_TABLE_NAME'];
					$sql .= '(SELECT `name` FROM `' . $REFERENCED_TABLE_NAME . '` '
					. 'WHERE `' . $REFERENCED_TABLE_NAME . '`.`id` = `' . $tb_name . '`.`' . $columns[$i] . '`)'
					. ' AS `' . $REFERENCED_TABLE_NAME . '`, ';
					$flag = FALSE;
					break;
				}
			}
			$sql .= $flag ? '`' . $columns[$i] . '`, ' : '';
		}
		$query = trim($sql, ', ') . ' FROM `' . $tb_name . '` WHERE `' . $columns[0] . '`=\'' . $id . '\' ORDER BY `' . $columns[0] . '` ASC LIMIT 10;';
		return static::$dbhash->query($query)->fetch(PDO::FETCH_ASSOC);
	}

	static function DatabaseTableDelete($tbName, $data) {
		$col = static::DatabaseTableColumns($tbName, TRUE)[0];
		$query = "DELETE FROM $tbName  WHERE $col=:$col";
		$stmt = static::$dbhash->prepare($query);
		$stmt->bindParam(":$col", $data, PDO::PARAM_INT);
		$return = $stmt->execute();
		static::DatabaseTableReindex($tbName);
		return $return;
	}

	static function DatabaseTableInsert($tbName, $datas) {
		$columns = static::DatabaseTableColumns($tbName, TRUE);
		$sql = 'INSERT INTO `' . $tbName . '` (';
		$values = ') VALUES (';
		$update = ' ON DUPLICATE KEY UPDATE ';
		for ($i = 0, $c = count($columns); $i < $c; $i++) {

			$sql .= '`' . $columns[$i] . '`, ';
			$values .= '\'' . $datas[$columns[$i]] . '\', ';
			$update .= '`' . $columns[$i] . '`=\'' . $datas[$columns[$i]] . '\', ';
		}
		$query = rtrim($sql, ', ') . rtrim($values, ', ') . ')' . rtrim($update, ', ') . ';';
		$stmt = static::$dbhash->prepare($query);
		return $stmt->execute();
	}
}
