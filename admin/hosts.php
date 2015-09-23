<?php

set_time_limit(10);

$sources[] = 'http://someonewhocares.org/hosts/hosts';
// $sources[] = 'http://www.malwaredomainlist.com/hostslist/hosts.txt';
// $sources[] = 'http://adaway.org/hosts.txt';
// $sources[] = 'http://winhelp2002.mvps.org/hosts.txt';
// $sources[] = 'http://www.montanamenagerie.org/hostsfile/hosts.txt';
// // $sources[] = 'http://hosts-file.malwareteks.com/hosts.txt';
// $sources[] = 'http://hphosts.gt500.org/hosts.txt';
// $sources[] = 'http://mistman.pdp10.org/pub/comp/internet-tools/hostsfiles/goofbook/hosts';
// $sources[] = 'hosts.dbot';

$hostsLst = array();
$i = 0;
$count = count($sources);
while ($i < $count) {
	$lines = file($sources[$i]);

	$j = 0;
	$lcount = count($lines);
	while ($i < $lcount) {
		$hostsLst = array_values(array_unique(array_merge($hostsLst, validate($lines[$j]))));
		unset($lines[$j]);
		++$j;
	}

	unset($sources[$i]);
	++$i;
}
// foreach ($sources as $source) {
// 	$lines = file($source);
// 	foreach ($lines as $line) {
// 		echo validate($line);
// 		$hostsLst = array_values(array_unique(array_merge($hostsLst, validate($line))));
// 	}
// }

// $hostsLst = hostsFilter($sources, count($sources) - 1);

// $hostsLst = array_values(array_unique($hostsLst));

// $i = 0;
// $count = count($hostsLst);
// while ($i < $count) {
// 	echo $hostsLst[$i];
// 	++$i;
// }

// function hostsFilter($sources, $id = 0) {
// 	if ($id < 0) {
// 		return array();
// 	}
// 	$hostsLst = array();
// 	$lines = file($sources[$id]);
// 	foreach ($lines as $line) {
// 		// $hostsLst[] = validate($line);
// 		// echo $line;

// 		echo validate($line);
// 	}
// 	return array_values(array_unique(array_merge($hostsLst, hostsFilter($sources, $id - 1))));
// }

function validate($value = '') {

	$regex = array();
	$regex[] = "/#(.*?)/";
	$regex[] = "/^[\r\n]/";

	foreach ($regex as $reg) {
		$ckeck = preg_match($reg, $value, $match);
		if ($ckeck == 1) {
			return '';
		}
	}
	$value = preg_split("/( |\t)/", $value);
	return $value[count($value) - 1];
}
