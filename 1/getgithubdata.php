<?php
include('bootstraps.php');
$sql="select githuburl from project_list where githuburl <> '' ";
$list=MySQLGetData($sql);
foreach($list as $k=>$v){
$list[$k]['githuburl']=str_replace(",","",$list[$k]['githuburl']);
    $baseurl=str_replace("github.com","api.github.com/repos",$list[$k]['githuburl']);
    
    if(strrpos($baseurl,"/")==strlen($baseurl)-1){
    $baseurl=substr($baseurl,0,strlen($baseurl)-1); 
    }
    $data=json_decode(curls($baseurl),true);;
    if(isset($data['message'])){
    //continue;
       // echo $baseurl.",</br>";
    }else{
     echo $baseurl.",</br>";
    $forks=$data['forks_count'];
        $stars=$data['stargazers_count'];
    $watchers=$data['watchers'];
        $lastupdatetime=$data['updated_at'];
        $createtime=date("Y-m-d H:i:s");
    echo $sql="insert into github_data (name,fork,stars,watches,lastupdatetime,createtime) values ('".$baseurl."',".$forks.",".$stars.",".$watchers.",'".$lastupdatetime."','".$createtime."')";
    MySQLRunSQL($sql);
    }
}
function curls($url){
    $access_tokenlist=['b26b6fe9c7beaba6edf83661c666d3ad5588b35a','764fca41598e100fb730e919f2c8793e4a0ceecf','e29a49e909d16af8b8585546e30f95ac0d073c7b','4e576749984599118e4d08c60cb671b1fb8b42cd','0bafb53c51a442f703305a6efa89110d9d1cb432','bf36187659ed6a982026b6b98b7b5c29b8c0ce58','000d0b14d5c3679189027db01830f15185acd80a','7fb8e14f38be5e329c5fd91f53500bddaa79c389','3d17e08990a655987ef012323d96781965b5bed8','af3fdfd6abbc63e62f14309883528ae54f3dfe21'];
    $headers = array(
        'Authorization:token  b26b6fe9c7beaba6edf83661c666d3ad5588b35a',
        'Accept:application/vnd.github.hellcat-preview+json',
        'User-Agent: Awesome-Octocat-App',
    );
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $url);
    //curl_setopt($curl, CURLOPT_POST, 1);
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 0);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    //执行命令
    $data = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);
    //显示获得的数据
    if (substr($data, 0,3) == pack("CCC",0xef,0xbb,0xbf)) {
        $data = substr($data, 3);
    }
    return $data;
  }
