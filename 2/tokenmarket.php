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
//}
$str = getSonString($content, '<div class="table-responsive compact-name-column">', '<div class="pull-right');
$str = getSonString($str, '<tbody>', '</tbody>');
// echo $str;

$rowList = explode('</tr>', $str);
$resList = array();
foreach ($rowList as $row) {
	$colList = explode('</td>', $row);
	$row = array()
	foreach ($colList as $col) {
		// var_dump($col);
		$colvalue = trim(getSonString2($col, '>', '<'));
		// echo $colvalue.'<br>';
		$row[] = $colvalue;
		// break;
	}
	array_pop($row);
	$resList[] = $row;
	// break;
}
array_pop($resList);

// foreach ($resList as $res) {
// 	$symbol = $res[2];
// 	$name = $res[1];
// 	$sql = "insert into `basic_token_list` (`symbol`,`name`) values ('".$symbol."','".$name."');";
// 	MySQLRunSQL($sql);
// 	echo $symbol.',';
// }
// echo json_encode($resList);

$sql = "select * from `basic_token_list`";
$table = MySQLGetData($sql);
if(count($resList) > count($table)) {
	for($i = count($table); $i < count($resList); $i++) {
		$res = $resList[$i];
		$symbol = $res[2];
		$name = $res[1];
		$sql = "insert into `basic_token_list` (`symbol`,`name`) values ('".$symbol."','".$name."');";
		MySQLRunSQL($sql);
		echo $symbol.',';
	}
}