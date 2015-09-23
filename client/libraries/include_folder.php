<?php

function include_folder($path) {
	foreach (glob($path . '/*.php') as $file) {
		require_once $file;
	}
}
