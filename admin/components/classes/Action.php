<?php

class Action {

	function __construct() {
	}

	static function Base() {
		$cmd = str_replace('/index.php', '', str_replace($_SERVER['HTTP_HOST'], '', $_SERVER['REQUEST_URI']));
		return static::{'Action' . file_exists(getcwd() . $cmd) . 'File'}($cmd);
	}

	static function Action($content = '', $act = 'html', $cmd = '') {
		return array('state' => 'Start', 'cmd' => $cmd);
	}

	static function Action1File($cmd = '') {
		$act = pathinfo(basename($cmd), PATHINFO_EXTENSION);
		return static::{'Action' . $act}(file_get_contents(getcwd() . $cmd), $act, $cmd);
	}

	static function ActionFile($cmd = '') {
		return static::Action('', '', $cmd);
	}

	static function Actionphp($content = '', $act = 'html', $cmd = '') {
		return static::Action($content, $act, $cmd);
	}

	static function Actionjs($content = '', $act = 'html') {
		Header::Base(JSMin::minify($content), $act);
		return array('state' => 'Close', 'cmd' => 0);
	}

	static function Actioncss($content = '', $act = 'html') {
		Header::Base(CssMin::minify($content), $act);
		return array('state' => 'Close', 'cmd' => 0);
	}

}