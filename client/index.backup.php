<?php

/* * **********************************************
 * set DEBUG On or Off							*
 * define('DEBUG', 1); On						*
 * define('DEBUG', 0); Off						*
 * ********************************************** */
define('DEBUG', 1);

/* * ********************************************
 * enable debug for developer					*
 * show html error								*
 * show track error								*
 * show all error								*
 * ******************************************** */
ini_set("html_errors", DEBUG);
ini_set("track_errors", DEBUG);
ini_set("display_errors", DEBUG);
error_reporting(E_ALL);

/* * ********************************************
 * caculator time to page execute script PHP	*
 * ******************************************** */
$page_start = microtime(1);

/* * ********************************************
 * include all file scripts						*
 * ******************************************** */
require_once "include/include.php";

/* * ********************************************
 * show time to page execute script PHP			*
 * ******************************************** */
global $app;
out_debug("Page was generated in " . (microtime(1) - $page_start) . " seconds");
