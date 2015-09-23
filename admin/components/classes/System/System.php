<?php

/*
 *
 */
class System extends SystemStartPlugin {

	static function Base() {
		$state = Action::Base();
		static::{'System' . $state['state']}($state['cmd']);
	}
}
