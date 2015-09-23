<?php

class Block_ips {

	public $ips = array();

	public function add($ip) {
		if (array_key_exists($ip, $this->ips)) {
			$this->ips[$ip] = $this->ips[$ip] + 1;
		} else {
			$this->ips[$ip] = 1;
		}
	}

	public function save() {
		clear_file("/var/www/html/syscron/block_hosts_hits");
		$content = "";
		foreach ($this->ips as $ip => $ip_hits) {
			$hostdeny = "/var/www/html/syscron/block_hosts_hits";
			$content.= PHP_EOL . "{$ip}#{$ip_hits}";
		}
		file_put_contents($hostdeny, $content);
	}

	public function load() {
		$hostdeny = "/var/www/html/syscron/block_hosts_hits";
		$lines = file($hostdeny);
		foreach ($lines as $line) {
			$this->ips[] = array(explode("#", $line)[0] => explode("#", $line)[1]);
		}
	}

}

$block_ips = new Block_ips;
$block_ips->load();

foreach (glob("secure/*") as $block_log) {
//	$block_log;
//	echo file("secure/$block_log");
//	$myfile = fopen("$block_log", "r") or die("Unable to open file!");
//	echo fread($myfile, filesize($block_log));
//	fclose($myfile);
//	break;

	$regex = array();
	$regex[] = "/authentication failure.*rhost=(.*?)  user=root/";
	$regex[] = "/Failed password for root from (.*?) port/";

	$handle = @fopen($block_log, "r") or die("Unable to open file!");
	while (!feof($handle)) {
		$line = fgets($handle);
		foreach ($regex as $value) {
			$flag = preg_match($value, $line, $match);
			if ($flag == 1) {
//				echo $match[1] . PHP_EOL;
				$block_ips->add($match[1]);
			}
		}
	}
	fclose($handle);
	break;
}

$block_ips->save();

//$ips = array();
//$hostdeny = "block_hosts_ips";
//$lines = file($hostdeny);
//foreach ($lines as $line) {
//	$ips[] = array(explode("#", $line)[0] => explode("#", $line)[1]);
//}
//var_dump($ips);