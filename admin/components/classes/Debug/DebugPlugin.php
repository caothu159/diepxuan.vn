<?php

/*
 *
 */
class DebugPlugin extends AnotherClass {

	static function Viewer($str) {
		static::{'Show' . Config::$debug}($str);
	}

	private static function Show1($str) {
		print_r($str);
	}

	private static function Show0($str) {

	}
}