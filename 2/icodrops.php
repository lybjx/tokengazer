<?php
include('bootstraps.php');

$url = 'https://icodrops.com/category/active-ico/';
$content = file_get_contents_https($url);
$str1 = getSonString($content, "<h3 class=\"col-md-12 col-12 not_rated\">All</h3>", "<div class=\"tabs__content\">");
$str2=explode("<h3><a href=\"",$str1);
print_r($str2);