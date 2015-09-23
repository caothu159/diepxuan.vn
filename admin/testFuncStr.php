<?php

set_time_limit(10);

function test() {
	return;
}

function test1() {
	return;
}

function fa($num) {
	$t = microtime(true);
	$i = 0;
	while ($i < $num) {
		++$i;
		if ($i === 0) {
			test0();
		} else {
			test1();
		}
	}
	return (microtime(true) - $t);
}

function fb($num) {
	$t = microtime(true);
	$i = 0;
	while ($i < $num) {
		++$i;
		if ($i > 0) {
			test1();
		} else {
			test0();
		}
	}
	return (microtime(true) - $t);
}

function fc($num) {
	$t = microtime(true);
	$i = 0;
	while ($i < $num) {
		++$i;
		$call = 'test' . ($i > 0);
		$call();
	}
	return (microtime(true) - $t);
}

$num = 40000000;

echo ("fa:" . fa($num) . " seconds.<br />\n");
echo ("fb:" . fb($num) . " seconds.<br />\n");
// echo ("fb:" . fc($num) . " seconds.<br />\n");
