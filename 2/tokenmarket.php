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
unset($tmp[0]);
	foreach($tmp as $k=>$v){
        $tmp1=$tmp[$k];
        $url=explode('<a href="',$tmp1);
        $url=explode('"',$url[1])[0];
        $tmp2=file_get_contents_https($url);
        $githuburl=explode("https://github.com/",$tmp2)[1];
        echo $githuburl="https://github.com/".explode("\"",$githuburl)[0];
    }
    
die;