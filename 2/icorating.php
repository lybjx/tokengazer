<?php
include('bootstraps.php');

$url = 'https://icorating.com/ico/?filter=all';
$content = file_get_contents_https($url);

$tokenList = getToeknListFromDB();
// echo json_encode($tokenList);
//echo count($tokenList).'<br>';

$head1 = '<h2>Investment Rating</h2>';
$end1 = '</tbody>';
$str1 = getSonString($content, $head1, $end1);
$str1 = getSonString($str1, '<tbody>', '</tbody>');
//print_r($str1);
$str2=explode('<td>',$str1);
$head2 = '<h2>Unassessed</h2>';
$end2 = '</tbody>';
$str3 = getSonString($content, $head2, $end2);
$str3 = getSonString($str3, '<tbody>', '</tbody>');
array_push($str2,$str3);
print_r($str2);die;
$i=0;
//print_r($str2);die;
foreach($str2 as $k=>$v){
    if($k==0||$k%2==0){
    echo $name=trim(explode("</td",$str2[$k])[0]);
        if(strstr($name,"'>"))
        {
            $arr[$i]['name']=$name=explode(">",$name)[1];
        }
    $url=getSonString($str2[$k],"<tr data-href='","'>",$str2[$k]);
        $con1=file_get_contents_https($url);
        $str3=explode("github.com/",$con1)[1];
        $str4=explode("\"",$str3)[0];
        $arr[$i]['githuburl']="https://github.com/".$str4;
    
    
}
$head2 = '<h2>Unassessed</h2>';
$end2 = '</tbody>';
$str2 = getSonString($content, $head2, $end2);
$str2 = getSonString($str2, '<tbody>', '</tbody>');