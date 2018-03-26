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
print_r($str1);
$str2=explode('<td>',$str1);
print_r($str2);

$head2 = '<h2>Unassessed</h2>';
$end2 = '</tbody>';
$str2 = getSonString($content, $head2, $end2);
$str2 = getSonString($str2, '<tbody>', '</tbody>');