<?php
include('bootstraps.php');
include('snoopy.php');
$snoopy=new Snoopy();

$url = 'https://coinmarketcap.com/';
$content = file_get_contents_https($url);
$url1 = getSonString($content, '<a class="currency-name-container" href="','\">');
print_r($url1);
