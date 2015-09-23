<?php

/**
 *
 */
class PageContentData extends AnotherClass {

	static function PageContentDataPost($tbName, $id = 0, $flag) {
		$cols = aTable::TableColumn($tbName);
		$data = array('id' => $id);
		foreach ($cols as $col) {
			$data[$col] = static::PageContentDataPostFilter($col);
		}
		$data = ArrayPlugin::RemoveEmpty($data, 0);

		if (count($data) > 1) {
			return $data;
		}
		return $id;
	}

	static function PageContentDataPostFilter($param) {
		$REQUESTS = array_merge(
			(array) filter_input_array(INPUT_GET)
			, (array) filter_input_array(INPUT_POST)
		);
		if (array_key_exists($param, $REQUESTS)) {
			return $REQUESTS[$param];
		}

		return '';
	}
}