<?php
include('bootstraps.php');

if(isset($_GET['p'])){
$p=$_GET['p'];
}
else{
$p='';
}
$url = 'https://coinmarketcap.com/'.$p;
$content = file_get_contents_https($url);
$content=getSonString($content,"<tbody>","</tbody>");
$url1 = getSonStrings($content, '<span class="currency-symbol"><a href="','">');
$githuburl=array();
$ret = $kv->init("xowlw2kmk2");
foreach($url1 as $k=>$v){
$contents1=file_get_contents_https("https://coinmarketcap.com".$url1[$k]);
    $arr[$i]['name']=explode("/",$url1[$k])[2];
    $arr[$i]['githuburl']=$githuburl[$i]=getSonString($contents1,'<span class="glyphicon glyphicon-hdd text-gray" title="Source Code"></span> <a href="','"');
    $ret = $kv->set('products:'.$, $url1[$kk]);
    $i++;
}
$kv = new SaeKV();

// 初始化SaeKV对象
//访问授权应用的数据

/*$url = 'https://coinmarketcap.com/3';
$content = file_get_contents_https($url);
$content=getSonString($content,"<tbody>","</tbody>");
$url1 = getSonStrings($content, '<span class="currency-symbol"><a href="','">');
foreach($url1 as $k=>$v){
$contents1=file_get_contents_https("https://coinmarketcap.com".$url1[$k]);
    $githuburl[$i]=getSonString($contents1,'<span class="glyphicon glyphicon-hdd text-gray" title="Source Code"></span> <a href="','"');
    $i++;
}
$url = 'https://coinmarketcap.com/4';
$content = file_get_contents_https($url);
$content=getSonString($content,"<tbody>","</tbody>");
$url1 = getSonStrings($content, '<span class="currency-symbol"><a href="','">');
foreach($url1 as $k=>$v){
$contents1=file_get_contents_https("https://coinmarketcap.com".$url1[$k]);
    $githuburl[$i]=getSonString($contents1,'<span class="glyphicon glyphicon-hdd text-gray" title="Source Code"></span> <a href="','"');
    $i++;
}
$url = 'https://coinmarketcap.com/5';
$content = file_get_contents_https($url);
$content=getSonString($content,"<tbody>","</tbody>");
$url1 = getSonStrings($content, '<span class="currency-symbol"><a href="','">');
foreach($url1 as $k=>$v){
$contents1=file_get_contents_https("https://coinmarketcap.com".$url1[$k]);
    $githuburl[$i]=getSonString($contents1,'<span class="glyphicon glyphicon-hdd text-gray" title="Source Code"></span> <a href="','"');
    $i++;
}*/
print_r($content.$url);
