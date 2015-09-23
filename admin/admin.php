<?php

define('PAGE_START_LOAD_TIME', microtime(TRUE));
define('ROOT_PATH', __DIR__);

require_once 'components/classes/System/SystemAutoLoad.php';
require_once 'components/classes/System/SystemRequireFile.php';
define('__autoload_match', SystemAutoLoad::SystemAutoLoadMatch());

ini_set('error_reporting', E_ALL);
ini_set('display_errors', Config::$debug);

ob_start('ob_gzhandler');
session_start();

System::Base();
