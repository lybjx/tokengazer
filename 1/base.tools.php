<?php
function file_get_contents_https($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSLVERSION,4);
	curl_setopt($ch, CURLOPT_CAINFO, __DIR__ . "/cacert.pem");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$content = curl_exec($ch);
	curl_close($ch);
	return $content;
}

function getSonString($parent,$start,$end) {
    $a1 = explode($start, $parent);
    $a2 = explode($end, $a1[1]);
    return $a2[0];
}

function getSonString2($parent,$start,$end) {
    $a1 = explode($start, $parent);
    $a2 = explode($end, $a1[count($a1) - 1]);
    if(trim($a2[0]) == '') {
    	$a2 = explode($end, $a1[count($a1) - 2]);
    }
    return $a2[0];
}