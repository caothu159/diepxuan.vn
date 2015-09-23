<?php

/**
 *
 */
class SystemClosePlugin {

	static function SystemClose($html = TRUE) {
		if ($html) {
			Debug::Viewer(1 / round(microtime(TRUE) - PAGE_START_LOAD_TIME, 7));
			echo "\n\t</body>\n</html>";}
		ob_end_flush();
		exit();
	}
}
?>