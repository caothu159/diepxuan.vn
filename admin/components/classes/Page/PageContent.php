<?php

/**
 *
 */
class PageContent extends PageContentTable {

	static function PageContentViewer($cmd) {
		switch (count($cmd)) {
			case 1:
				static::PageContentTableViewer(aTable::TableGetAll($cmd[0]));
				break;
			case 2:
				$callBack = static::{'PageContentAction' . $cmd[1]	}($cmd[0], static::PageContentDataPost($cmd[0], '0', $cmd[1] == 'delete'));
				static::PageContentActionDone($cmd, $callBack);
				break;
			case 3:
				$callBack = static::{'PageContentAction' . $cmd[1]	}($cmd[0], static::PageContentDataPost($cmd[0], $cmd[2], $cmd[1] == 'delete'));
				static::PageContentActionDone($cmd, $callBack);
				break;

			default:
				static::PageContentTableViewer(aTable::TableGetAll($cmd[0]));
				break;
		}

	}
}