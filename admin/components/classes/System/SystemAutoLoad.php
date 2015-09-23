<?php

/**
 *
 */
class SystemAutoLoad {

	static function Base($path) {
		preg_match(__autoload_match, $path, $dir);
		if (count($dir) > 1) {
			SystemRequireFile::Base('components/classes/' . $dir[1] . '/' . $path . '.php');
		} else {
			SystemRequireFile::Base('components/classes/' . $path . '.php');
		}
	}

	static function SystemAutoLoadMatch($value = '') {
		$dirs = static::SystemAutoLoadDir();
		$return = '/(' . explode('components/classes/', $dirs[0])[1];
		for ($i = 1; $i < count($dirs); $i++) {
			$return .= '|' . explode('components/classes/', $dirs[$i])[1];
		}
		$return .= ')/';
		return $return;
	}

	static function SystemAutoLoadDir() {
		return glob('components/classes/*', GLOB_ONLYDIR);
	}
}

/**
 * auto load file php when call class
 * @param  [type] $className
 */
function __autoload($className) {
	SystemAutoLoad::Base($className);
}