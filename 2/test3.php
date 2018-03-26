<?php
include('bootstraps.php');
include('snoopy.php');
$snoopy=new Snoopy();

$url = 'https://github.com/ethereum/go-ethereum';
//$url = $_GET['url'];
$snoopy->fetch($url);
$content = file_get_contents_https($url);

$str = getSonString($content, '<ul class="numbers-summary">', '</ul>');

$watchers = getSonString($content, '/watchers', '/a>');
$watchers = getSonString($watchers, '>', '<');
$watchers = trim($watchers);
$watchers = str_replace(',', '', $watchers);

$commits = getSonString($content, '<li class="commits">', '/li>');
$commits = getSonString($commits, '<span class="num text-emphasized">', '</span>');
$commits = trim($commits);
$commits = str_replace(',', '', $commits);

$branches = getSonString($content, '<li class="branches">', '/li>');
$branches = getSonString($commits, '<span class="num text-emphasized">', '</span>');
$branches = trim($branches);
$branches = str_replace(',', '', $branches);

$releases = getSonString($content, '/releases">', '/a>');
$releases = getSonString($releases, '<span class="num text-emphasized">', '</span>');
$releases = trim($releases);
$releases = str_replace(',', '', $releases);
print_r($releases);die;


$stargazers = getSonString($content, '/stargazers', '/a>');
$stargazers = getSonString($stargazers, '>', '<');
$stargazers = trim($stargazers);
$stargazers = str_replace(',', '', $stargazers);

$fork = getSonString($content, '/network', '/a>');
$fork = getSonString($fork, '>', '<');
$fork = trim($fork);
$fork = str_replace(',', '', $fork);

$rowList = explode('<li>', $str);
$resList = array($watchers, $stargazers, $fork);
foreach ($rowList as $row) {
	$res = getSonString($row, '<span', '/span>');
	$res = getSonString($res, '>', '<');
	$res = trim($res);
	$res = str_replace(',', '', $res);
	$resList[] = $res;
}
var_dump($resList);