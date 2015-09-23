<?php

/**
 *
 */
class SystemCmd extends SystemClosePlugin {

	static function SystemCmdLevel($cmd = '') {
		return ArrayPlugin::RemoveEmpty(explode('/', $cmd));
	}
}