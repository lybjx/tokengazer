<?
include('bootstraps.php');
echo $sql="select name from ico_Analysis where id>396";
$data=MySQLGetData($sql);
foreach($data as $k=>$v){
$url="https://api.coinmarketcap.com/v1/ticker/".$data[$k]['name']."/";
    $result=file_get_contents_https($url);
    $results=json_decode(result,true);
    if(isset($results['error'])&&is_not_json($result)==false){
    continue;
    }
    $Current_market_value=$results[0]['market_cap_usd'];
    $Current_Circulation=$results[0]['available_supply'];
    $Current_Single_price=$results[0]['price_usd'];
    $html=file_get_contents_https("https://coinmarketcap.com/currencies/".$data[$k]['name']."/");
    $tmpstr3=explode("<li><span class=\"glyphicon glyphicon-hdd text-gray\" title=\"Source Code\"></span> ",$html)[1];
    $tmpstr2=explode("<a href=\"",$tmpstr3)[1];
    $tmpstr4=explode("\"",$tmpstr2)[0];
    $githuburl=$tmpstr4;
    //echo $sql="update ico_Analysis set Github_url='".$githuburl."' where name='".$data[$k]['name']."'";
    //MySQLRunSQL($sql);
    $sql="update ico_Analysis set Current_market_value='".$Current_market_value."',Current_Circulation='".$Current_Circulation."',Current_Single_price='".$Current_Single_price."'  where name='".$data[$k]['name']."'";
    MySQLRunSQL($sql);
}
function is_not_json($str){ 
    return is_null(json_decode($str));
}
?>