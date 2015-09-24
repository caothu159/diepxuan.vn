<?php

$file_path = '/var/www/html/syscron/secure';
$current_ip = exec("curl http://icanhazip.com/");

$ips = array();

$regex = array();
// $regex[] = "/authentication failure.*rhost=(.*?)(\n| .*)/";
$regex[] = "/Failed password for .* from (.*?) port/";
$regex[] = "/Did not receive identification string from (.*?)(\n| .*)/";
$regex[] = "/Received disconnect from (.*?)(\n|:.*)/";
$regex[] = "/Invalid user .* from (.*?)\n/";

$handle = @fopen($file_path, "r") or die("Unable to open file!");
while (!feof($handle)) {
	$line = fgets($handle);
	foreach ($regex as $value) {
		$flag = preg_match($value, $line, $match);
		if ($flag == 1) {
			$ip = $match[1];
			if (array_key_exists($ip, $ips)) {
				$ips[$ip] = $ips[$ip] + 1;
			} else {
				$ips[$ip] = 1;
			}
		}
	}
}
fclose($handle);
// foreach ($ips as $ip => $hits) {
	// echo "{$ip}#{$hits}<br />";
// }

unset($ips['localhost']);
unset($ips[$current_ip]);
unset($ips['no-data']);
unset($ips['www.diepxuan.vn']);
unset($ips['cmd.diepxuan.vn']);
unset($ips['diepxuan.vn']);

$hostdeny = "/var/www/html/syscron/hosts.deny";

// $lines = file($hostdeny);
foreach ($ips as $ip => $ip_hits) {
	if ($ip_hits >= 3) {
		$finded = false;
		if ($handle = fopen($hostdeny, "r")) {
			$count = 0;
			while (($line = fgets($handle, 4096)) !== FALSE and $line[0] != '#' and !$finded) {
				$finded = (strpos($line, "ALL: {$ip}") !== FALSE) ? true : false;
			}
			fclose($handle);
		}
		if (!$finded) {
			file_put_contents($hostdeny, "ALL: {$ip}" . PHP_EOL, FILE_APPEND | LOCK_EX);
		}
	}
}

$allows = preg_grep("/.*{$current_ip}/", file($hostdeny));
$contents = file_get_contents($hostdeny);
foreach ($allows as $allow) {
	$contents = str_replace($allow, '', $contents);
}
file_put_contents($hostdeny, $contents);
