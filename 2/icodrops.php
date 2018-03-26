<?php
include('bootstraps.php');

$url = 'https://icodrops.com/category/active-ico/';
$content = file_get_contents_https($url);
$str1 = getSonString($content, "<div class='col-lg-6 col-md-12 col-12 all' id='ajaxc'>", "<div class=\"col-md-12 col-12 a_ico showmore\">");
print_r($str1);