<!DOCTYPE html>
<html>
	<head>
		<title>[DiepXuan] Administrator</title>
		<meta charset="UTF-8" />
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="apple-touch-icon" sizes="57x57" href="/images/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/images/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/images/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/images/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/images/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/images/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="/images/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="/images/favicons/favicon-194x194.png" sizes="194x194">
		<link rel="icon" type="image/png" href="/images/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="/images/favicons/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="/images/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="/images/favicons/manifest.json">
		<link rel="shortcut icon" href="/images/favicons/favicon.ico">
		<meta name="msapplication-TileColor" content="#00aba9">
		<meta name="msapplication-TileImage" content="/images/favicons/mstile-144x144.png">
		<meta name="msapplication-config" content="/images/favicons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">
		<link rel="stylesheet" async="true" type="text/css" href="/index.php/components/css/admin.css" />
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="/components/ckeditor/ckeditor.js"></script>
		<script async="true" src="/index.php/components/js/js.js"></script>
	</head>
	<body>
<?php

class Page extends PageCmd {

	static $tables;

	static function Base($cmd) {
		static::$tables = Tables::Menus();
		$cmd = static::CmdInt($cmd);
		static::PageMenuViewer($cmd);
		static::PageContentViewer($cmd);
	}
}
?>