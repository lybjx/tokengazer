<?php
include('bootstraps.php');

if(isset($_GET['p'])){
$p=$_GET['p'];
}
else{
$p='';
}
$kv = new SaeKV();
$ret = $kv->init("xowlw2kmk2");

$url = 'https://icorating.com/ico/?filter=all';
$content = file_get_contents_https($url);
$datas=getSonString($content,"<tbody>","</tbody");
print_r($datas);