<?php

class PageMenu extends PageContent {

	static function PageMenuViewer($cmd) {
		static::PageMenuStart();
		static::PageMenuLogo();
		static::PageMenuEntrys($cmd, static::$tables);
		static::PageMenuDone();
	}

	static function PageMenuStart() {
		echo '<div class="cats">';
	}

	static function PageMenuLogo() {
		echo '<a href="http://' . $_SERVER['HTTP_HOST'] . '">'
		. '<img src="/images/logo/logo.png" alt="DiepXuan.vn" width="200" height="50">'
		. '</a>';
	}

	static function PageMenuEntrys($cmd, $tables) {
		for ($i = 0, $c = count($tables); $i < $c; $i++) {
			$callBack = 'PageMenuEntrysSelected' . ($tables[$i] == $cmd[0]);
			static::$callBack($tables[$i]);
		}
	}

	static function PageMenuEntrysSelected1($name = '') {
		echo '<a id="' . $name . '" class="selected" href="/index.php/' . $name . '">' . $name . '</a>';
	}

	static function PageMenuEntrysSelected($name = '') {
		echo '<a id="' . $name . '" href="/index.php/' . $name . '">' . $name . '</a>';
	}

	static function PageMenuDone() {
		echo '</div>';
	}
}