<?php
include('bootstraps.php');
ini_set('max_execution_time', '0');
$kv = new SaeKV();
$ret = $kv->init("xowlw2kmk2");
$url = 'https://icodrops.com/category/active-ico/';
$content = file_get_contents_https($url);
$str1 = trim(getSonString($content, "<h3 class=\"col-md-12 col-12 not_rated\">All</h3>", "<div class=\"tabs__content\">"));
$str2=explode("<div class=\"ico-main-info\">",$str1);
unset($str2[0]);
$i=0;
foreach($str2 as $k=>$v){
	$url=explode("\" rel=\"bookmark\">",explode("<h3><a href=\"",$str2[$k])[1])[0];
    $arr[$i]['name']=$name=explode("</a>",explode("\" rel=\"bookmark\">",explode("<h3><a href=\"",$str2[$k])[1])[1])[0].",";
    $contents1=file_get_contents_https($url);
    $arr[$i]['githhuburl']=$githuburl="https://github.com/".explode("\"",explode("https://github.com/",$contents1)[1])[0];
    $i++;
    $ret = $kv->delete('icodropsproducts:'.$i);
        $kv->add('icodropsproducts:'.$i, json_encode($arr[$i],true));
    
     $kv->get('icodropsproducts:'.$i);
}

$url = 'https://icodrops.com/category/upcoming-ico/';
$content = file_get_contents_https($url);
$str1 = trim(getSonString($content, "<h3 class=\"col-md-12 col-12 not_rated\">All</h3>", "<div class=\"tabs__content\">"));
$str2=explode("<div class=\"ico-main-info\">",$str1);
unset($str2[0]);
foreach($str2 as $k=>$v){
	$url=explode("\" rel=\"bookmark\">",explode("<h3><a href=\"",$str2[$k])[1])[0];
    $arr[$i]['name']=$name=explode("</a>",explode("\" rel=\"bookmark\">",explode("<h3><a href=\"",$str2[$k])[1])[1])[0].",";
    $contents1=file_get_contents_https($url);
    $arr[$i]['githhuburl']=$githuburl="https://github.com/".explode("\"",explode("https://github.com/",$contents1)[1])[0];
    $i++;
    $ret = $kv->delete('icodropsproducts:'.$i);
        $kv->add('icodropsproducts:'.$i, json_encode($arr[$i],true));
    
     $kv->get('icodropsproducts:'.$i);
}
$i=0;
$url = 'https://icodrops.com/category/ended-ico/';
$content = file_get_contents_https($url);
$str1 = trim(getSonString($content, "<h3 class=\"col-md-12 col-12 not_rated\">All</h3>", "<div class=\"tabs__content\">"));
$str2=explode("<div class=\"ico-main-info\">",$str1);
unset($str2[0]);
foreach($str2 as $k=>$v){
	$url=explode("\" rel=\"bookmark\">",explode("<h3><a href=\"",$str2[$k])[1])[0];
    $arr[$i]['name']=$name=explode("</a>",explode("\" rel=\"bookmark\">",explode("<h3><a href=\"",$str2[$k])[1])[1])[0].",";
    $contents1=file_get_contents_https($url);
    $arr[$i]['githhuburl']=$githuburl="https://github.com/".explode("\"",explode("https://github.com/",$contents1)[1])[0];
    $i++;
    $ret = $kv->delete('icodropsproducts:'.$i);
        $kv->add('icodropsproducts:'.$i, json_encode($arr[$i],true));
    
     $kv->get('icodropsproducts:'.$i);
}
$ret = $kv->delete('icodropsproducts:all');
        $kv->add('icodropsproducts:all', json_encode($arr,true));
    
     $kv->get('icodropsproducts:all');
