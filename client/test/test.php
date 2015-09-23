<?php
$elements = array();

////
// An array of 10,000 elements with random string values
////
for ($i = 0; $i < 333333; $i++) {
	$elements[] = (string) rand(10000000, 99999999);
}

$time_start = microtime(true);

////
// for test
////
for ($i = 0, $numb = count($elements); $i < $numb; $i++) {}

$time_end = microtime(true);
$for_time = $time_end - $time_start;

$time_start = microtime(true);

////
// for with count() inside loop test
////
for ($i = 0; $i < count($elements); $i++) {}

$time_end = microtime(true);
$for_count_time = $time_end - $time_start;

$time_start = microtime(true);

////
// foreach test
////
foreach ($elements as $element) {}

$time_end = microtime(true);
$foreach_time = $time_end - $time_start;

echo "For took: " . number_format($for_time * 1000, 3) . "ms<br />";
echo "For with count() took: " . number_format($for_count_time * 1000, 3) . "ms<br />";
echo "Foreach took: " . number_format($foreach_time * 1000, 3) . "ms<br />";
?>