<?php
include('bootstraps.php');

$url = 'https://icodrops.com/category/active-ico/';
$content = file_get_contents_https($url);
$str1 = trim(getSonString($content, "<h3 class=\"col-md-12 col-12 not_rated\">All</h3>", "<div class=\"tabs__content\">"));
$str2=explode("<div class=\"ico-main-info\">",$str1);
unset($str2[0]);
foreach($str2 as $k=>$v){
	echo $url=explode("\" rel=\"bookmark\">",explode("<h3><a href=\"",$str2[$k])[1])[0];
}
print_r($str2);