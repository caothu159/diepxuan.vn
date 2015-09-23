<?php

$domains = array("diepxuan.vn", "diepxuan.tk");
$emailAddress = "caothu91@gmail.com";
$apiKey = "ff479681c51aeeabde8d17109a69f3c55a49f";
$current_ip = exec("curl http://icanhazip.com/");
$url = 'https://www.cloudflare.com/api_json.html';

foreach ($domains as $domain) {
	dns_load($domain);
}

function dns_load($ddnsAddress) {
	global $apiKey, $current_ip, $emailAddress, $url;
	$id = 0;
	$cfIP = '';
	$fields = array(
		'a' => urlencode('rec_load_all'),
		'tkn' => urlencode($apiKey),
		'email' => urlencode($emailAddress),
		'z' => urlencode($ddnsAddress),
	);
	$fields_string = "";
	foreach ($fields as $key => $value) {
		$fields_string .= $key . '=' . $value . '&';
	}
	rtrim($fields_string, '&');
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, count($fields));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	// echo ($result);

	$data = json_decode($result);
	foreach ($data->response->recs->objs as $rec) {
		if ($rec->name == $ddnsAddress) {
			$id = $rec->rec_id;
			$cfIP = $rec->content;
			break;
		}
	}

	if ($current_ip != $cfIP) {
		$fields = array(
			'a' => urlencode('rec_edit'),
			'tkn' => urlencode($apiKey),
			'id' => urlencode($id),
			'email' => urlencode($emailAddress),
			'z' => urlencode($ddnsAddress),
			'type' => urlencode('A'),
			'name' => urlencode($ddnsAddress),
			'content' => urlencode($current_ip),
			// 'service_mode' => urlencode('1'),
			'ttl' => urlencode('1'),
		);

		$fields_string = "";
		foreach ($fields as $key => $value) {
			$fields_string .= $key . '=' . $value . '&';
		}
		rtrim($fields_string, '&');

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, count($fields));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
	}
}

function dns_get_id($value = '') {
	# code...
}

function dns_update() {

}
