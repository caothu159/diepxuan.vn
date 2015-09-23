<?php
class Header {

	static function Base($content = '', $act = 'html') {
		$HashID = md5($content);
		$LastChangeTime = 1144055759;
		$ExpireTime = 86400;
		$headers = apache_request_headers();
		static::{'Header' . $act}();
		header('Content-Type: text/' . ($act == 'js' ? 'javascript' : $act) . '; charset=UTF-8');
		header('Vary: Accept-Encoding');
		header('Content-language: vi');
		header('Cache-Control: max-age=' . $ExpireTime);
		header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $ExpireTime) . ' GMT');
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $LastChangeTime) . ' GMT');
		header('ETag: ' . $HashID);

		$PageWasUpdated = !(isset($headers['If-Modified-Since']) and
			strtotime($headers['If-Modified-Since']) == $LastChangeTime);
		$DoIDsMatch = (isset($headers['If-None-Match']) and
			ereg($HashID, $headers['If-None-Match']));

		if (!$PageWasUpdated or $DoIDsMatch) {
			header('HTTP/1.1 304 Not Modified');
			header('Connection: close');
		} else {
			header('HTTP/1.1 200 OK');
			header('Content-Length: ' . strlen($content));
			print $content;
		}
	}

	static function Headerjs() {
		header('Content-Type: text/javascript; charset=UTF-8');
	}

	static function Headercss() {
		header('Content-Type: text/css; charset=UTF-8');
	}

	static function Headerhtml() {
		header('Content-Type: text/html; charset=UTF-8');
	}
}
