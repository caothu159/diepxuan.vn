<?php

function fa() {return 1;}
function fb() {return 1;}
function fc() {return 1;}

$calla = 'fa';
$callb = 'fb';
$callc = 'fc';

$time = microtime(true);
for ($i = 50000; $i--;) {
	$x = 0;
	$x += fa();
	$x += fb();
	$x += fc();
	if ($x != 3) {
		die('Bad numbers');
	}

}
echo ("Gọi trực tiếp           :" . (microtime(true) - $time) . " seconds.<br />\n");

$time = microtime(true);
for ($i = 50000; $i--;) {
	$x = 0;
	$x += $calla();
	$x += $callb();
	$x += $callc();
	if ($x != 3) {
		die('Bad numbers');
	}

}
echo ("Gọi từ chuỗi            :" . (microtime(true) - $time) . " seconds.<br />\n");

$time = microtime(true);
for ($i = 50000; $i--;) {
	$x = 0;
	$x += call_user_func('fa', '');
	$x += call_user_func('fb', '');
	$x += call_user_func('fc', '');
	if ($x != 3) {
		die('Bad numbers');
	}

}
echo ("gọi bằng call_user_func :" . (microtime(true) - $time) . " seconds.<br />\n");

$time = microtime(true);
for ($i = 50000; $i--;) {
	$x = 0;
	eval('$x += ' . $calla . '();');
	eval('$x += ' . $callb . '();');
	eval('$x += ' . $callc . '();');
	if ($x != 3) {
		die('Bad numbers');
	}

}
echo ("gọi bằng eval           :" . (microtime(true) - $time) . " seconds.<br />\n");

