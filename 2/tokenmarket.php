<?php
include('bootstraps.php');

$url = 'https://tokenmarket.net/blockchain/all-assets';
$content = file_get_contents($url);
$counts=explode("<small>Showing <strong>",$content)[1];
$counts=explode("</strong> assets</small>",$counts)[0];
$pages= ceil($counts/20);
//for($i=0;$i<$pages;$i++){
$contents=file_get_contents_https("https://tokenmarket.net/blockchain/all-assets?batch_num=0&batch_size=".$counts);
    $str=explode("<tbody>",$contents)[1];
$str=explode("</tbody>",$str)[0];
    $tmp=explode("<td class=\"col-asset-name\">",$str);
	foreach($tmp as $k=>$v){
        $tmp1=$tmp[$k][1];
        $url=explode('<a href="',$tmp1);
        echo $url=explode('"',$url[1])[0];
    }
    //print_r($str);
die;