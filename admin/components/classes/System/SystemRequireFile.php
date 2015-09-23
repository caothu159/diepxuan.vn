<?php

/**
 *
 */
class SystemRequireFile {

	static function Base($path = '') {
		$path = ROOT_PATH . '/' . $path;
		if (!defined($path)) {
			require $path;
			define($path, 1);
		}
	}
}
