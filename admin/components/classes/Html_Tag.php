<?php

class Html_Tag {

	public static function Input_int($name, $value) {
		return
		'<input type="number" '
		. 'name="' . $name . '" '
		. 'onkeypress="return event.charCode >= 48 && event.charCode <= 57" '
		. 'value="' . $value . '"'
		. '></input>';
	}

	public static function Input_varchar($name, $value) {
		return
		'<input type="text" '
		. 'name="' . $name . '" '
		. 'value="' . $value . '"'
		. '></input>';
	}

	public static function Input_text($name, $value) {
		return
		'<textarea cols="120" rows="18"'
		. 'name="' . $name . '">'
		. $value
		. '</textarea>';
		// . '<script>CKEDITOR.replace("' . $name . '");</script>';
	}

	public static function Input_hidden($name, $value) {
		return
		'<input type="hidden" '
		. 'name="' . $name . '" '
		. 'value="' . $value . '"'
		. '></input>';
	}
	public static function Input_Array($name, $value, $data) {
		$return = '<select name="' . $name . '">';
		for ($i = 0, $c = count($data); $i < $c; $i++) {
			$return .= '<option value="' . $data[$i]['id'] . '"' . ($value === $data[$i]['id'] ? ' selected' : '') . '>' . $data[$i]['name'] . '</option>';
		}
		$return .= '</select>';
		return $return;
	}

	public static function Input_longblob() {}

	public static function Form($action = NULL, $source) {
		return
		($action == NULL ? '<form  ' : '<form action="?action=' . $action . '" ')
		. 'method="POST" '
		. 'accept-charset="UTF-8" '
		. 'enctype="application/x-www-form-urlencoded">'
		. $source
		. '</form>';
	}

	public static function Table($name = '', $rows, $total) {
		$data = '';
		foreach ($rows as $row) {
			$data .= '<tr>'
			. '<th>' . $row[0] . '</th>'
			. '<td>' . $row[1] . '</td>'
			. '</tr>';
		}
		$return = '<table border="1">' . $data . $total . '</table>';
		return $return;
	}

}