<?php

/**
 *
 */
class PageContentTable extends PageContentAction {

	static function PageContentTableViewer($rows) {
		static::ViewerTableStart();
		static::ViewerTableHeader(array_keys($rows[0]));
		static::ViewerTableRows(array_keys($rows[0]), $rows);
		static::ViewerTableDone();
	}

	private static function ViewerTableStart() {
		echo '<table border="1">';
	}

	private static function ViewerTableHeader($cols) {
		Debug::Viewer(System::$cmd);
		echo '<tr><th width="100">Action<a href="/index.php' . (System::$cmd == '' ? static::$tables[0] : System::$cmd) . '/new">new</a></th>';
		foreach ($cols as $col) {
			echo '<th>' . $col . '</th>';
		}
		echo '</tr>';
	}

	private static function ViewerTableRows($columns, $rows) {
		foreach ($rows as $row) {
			echo "<tr><td>"
			. '<a href="/index.php' . System::$cmd . '/edit/' . $row['id'] . '">edit</a>'
			. '<a href="/index.php' . System::$cmd . '/delete/' . $row['id'] . '">del</a>'
			. '</td>';
			foreach ($columns as $column) {
				echo '<td>' . $row[$column] . '</td>';
			}
			echo '</tr>';
		}
	}

	private static function ViewerTableDone() {
		echo '</table>';
	}
}