<?php
include('bootstraps.php');
include('snoopy.php');
$snoopy=new Snoopy();

$url = 'https://coinmarketcap.com/';
$content = file_get_contents_https($url);
$content=getSonString($content,"<tbody>","</tbody>");
$url1 = getSonStrings($content, '<a class="currency-name-container" href="','\"');
print_r($url1);
