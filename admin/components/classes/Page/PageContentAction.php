<?php

/**
 *
 */
class PageContentAction extends PageContentActionViewer {

	/**
	 * Delete Row
	 * @param [type] $tbName Table Name
	 * @param [type] $id     Id row
	 */
	static function PageContentActionDelete($tbName, $data) {
		$return = aTable::TableDelete($tbName, $data);
		return $return;
	}

	/**
	 * New row
	 * @param [type] $tbName Table Name
	 * @param string $data   new row data
	 */
	static function PageContentActionNew($tbName, $data = '') {
		if (is_array($data)) {
			return aTable::TableNew($tbName, $data);
		}

		$data = Database::DatabaseTableType($tbName);
		static::PageContentActionNewViewer($tbName, $data);
		// return static::{'PageContentActionNewExecute' . ($data != '')}($tbName, $data);
	}

	/**
	 * Edit row
	 * @param [type] $tbName Table name
	 * @param string $data   edit row data
	 */
	static function PageContentActionEdit($tbName, $data = '') {
		if (is_array($data)) {
			return aTable::TableEdit($tbName, $data);
		}

		$data = Database::DatabaseTableType($tbName, $value = TRUE, $data);
		static::PageContentActionEditViewer($tbName, $data);
	}

	/**
	 * Done action
	 */
	static function PageContentActionDone($cmd, $flag = FALSE) {
		if ($flag) {
			header('Location: /index.php/' . $cmd[0]);
		}

	}
}