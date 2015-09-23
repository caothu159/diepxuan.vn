<?php

/**
 *
 */
class SystemStartPlugin extends SystemCmd {

	static $cmd;

	static function SystemStart($cmd = '') {

		static::$cmd = $cmd;
		Header::Base();
		Database::Base();
		Page::Base(SystemCmd::SystemCmdLevel($cmd));

		static::SystemClose();
	}
}
