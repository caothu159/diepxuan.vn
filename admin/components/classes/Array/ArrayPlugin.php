<?php

/**
 *
 */
class ArrayPlugin extends AnotherClass {

	static function RemoveEmpty($arr, $reindex = 1) {
		$callBack = 'RemoveElementEmpty' . (($key = array_search('', $arr)) !== false);
		return static::{'RemoveEmptyReindex' . $reindex}(static::$callBack($arr, $key));
	}

	static function RemoveElementEmpty1($arr, $key) {
		unset($arr[$key]);
		$callBack = 'RemoveElementEmpty' . (($key = array_search('', $arr)) !== false);
		return static::$callBack($arr, $key);
	}

	static function RemoveElementEmpty($arr, $key) {
		return $arr;
	}

	static function RemoveEmptyReindex1($arr) {
		return array_values($arr);
	}

	static function RemoveEmptyReindex0($arr) {
		return $arr;
	}
}