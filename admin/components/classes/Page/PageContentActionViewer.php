<?php

/**
 *
 */
class PageContentActionViewer extends PageContentData {

	static function PageContentActionNewViewer($tbName, $data) {
		$value = array();
		for ($i = 0, $c = count($data); $i < $c; $i++) {
			$type = 'Input_' . (is_array($data[$i]['DATA_TYPE']) ? 'array' : $data[$i]['DATA_TYPE']);
			$value[] = array($data[$i]['COLUMN_NAME'], Html_Tag::$type($data[$i]['COLUMN_NAME'], static::PageContentDataPostFilter($data[$i]['COLUMN_NAME']), $data[$i]['DATA_TYPE']));
		}
		$total = '<tr>'
		. '<td colspan="2">'
		. '<input type="submit" value="Đồng ý">'
		. '<a href="/index.php/' . $tbName . '">Hủy</a>'
		. '</td>'
		. '</tr>';

		echo Html_Tag::Form(NULL,
			Html_Tag::Table('', $value, $total)
		);
	}

	static function PageContentActionEditViewer($tbName, $data) {
		$value = array();
		for ($i = 0, $c = count($data); $i < $c; $i++) {
			$type = 'Input_' . (is_array($data[$i]['DATA_TYPE']) ? 'array' : $data[$i]['DATA_TYPE']);
			$value[] = array(
				$data[$i]['COLUMN_NAME'],
				Html_Tag::$type($data[$i]['COLUMN_NAME'],
					$data[$i]['COLUMN_VALUE'] == '' ? static::PageContentDataPostFilter($data[$i]['COLUMN_NAME']) : $data[$i]['COLUMN_VALUE'],
					$data[$i]['DATA_TYPE']),
			);
		}
		$total = '<tr>'
		. '<td colspan="2">'
		. '<input type="submit" value="Đồng ý">'
		. '<a href="/index.php/' . $tbName . '">Hủy</a>'
		. '</td>'
		. '</tr>';

		echo Html_Tag::Form(NULL,
			Html_Tag::Table('', $value, $total)
		);
	}
}