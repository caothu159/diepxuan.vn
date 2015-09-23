<?php

/* * ********************************************
 * include all file script php needed			*
 * ******************************************** */
require_once 'libraries/include_folder.php';

foreach (glob("config/*.php") as $file) {
	require_once $file;
}

include_folder('libraries');
include_folder('config');
include_folder('system');
include_folder('model');
