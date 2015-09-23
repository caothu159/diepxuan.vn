<?php

/**
 *
 */
class PageCmd extends PageMenu {

	static function CmdInt($cmd) {
		if (count($cmd) > 0) {
			if (in_array($cmd[0], static::$tables)) {
				return $cmd;
			}
			return array(static::$tables[0]);
		}
		return array(static::$tables[0]);
	}
}