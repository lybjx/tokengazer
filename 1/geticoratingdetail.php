<?php
include('bootstraps.php');
$sql="select * from project_list where name <>'' and DataSource='icorating'";
$data=MySQLGetData($sql);
foreach($data as $k=>$v){
echo $name=explode(" (",$data[$k]['name'])[0];
    if(strstr($name," ")){
    $name=str_replace(" ","-",$name);
    }
    echo $url="https://icorating.com/ico/".$name."/details/";
}
//$url="https://icorating.com/ico/crowd-machine/details/";
$html=file_get_contents_https($url);
$str =explode("uk-table",$html)[1];
$str=explode("Pre-ICO start date:",$str)[1];
$PreICOstartdate=getSonString($str,"<td>","</td>");
echo $PreICOstartdate;
$str =explode("uk-table",$html)[2];
$str=explode("ICO start date:",$str)[1];
$ICOstartdate=getSonString($str,"<td>","</td>");
echo $ICOstartdate;
$str =explode("uk-table",$html)[2];
$str=explode("ICO end date:",$str)[1];
$ICOenddate=getSonString($str,"<td>","</td>");
echo $ICOenddate;
$str =explode("uk-table",$html)[2];
$str=explode("ICO Token Supply:",$str)[1];
$ICOTokenSupply=getSonString($str,"<td>","</td>");
echo $ICOTokenSupply;
$str =explode("uk-table",$html)[3];
$str=explode("Ticker",$str)[1];
$Ticker=getSonString($str,"<td>","</td>");
echo $ICOTokenSupply;
$str =explode("uk-table",$html)[3];
$str=explode("Ticker:",$str)[1];
$Ticker=getSonString($str,"<td>","</td>");
echo $Ticker;
$str =explode("uk-table",$html)[3];
$str=explode("Type:",$str)[1];
$Type=getSonString($str,"<td>","</td>");
echo $Type;
$str =explode("uk-table",$html)[3];
$str=explode("Token Standard:",$str)[1];
$TokenStandard=getSonString($str,"<td>","</td>");
echo $TokenStandard;
$str =explode("uk-table",$html)[3];
$str=explode("AdditionalTokenEmission:",$str)[1];
$AdditionalTokenEmission=getSonString($str,"<td>","</td>");
echo $AdditionalTokenEmission;
$str =explode("uk-table",$html)[3];
$str=explode("Accepted Currencies:",$str)[1];
$AcceptedCurrencies=getSonString($str,"<td>","</td>");
echo $AcceptedCurrencies;
$str =explode("uk-table",$html)[3];
$str=explode("Bonus Program:",$str)[1];
$BonusProgram=getSonString($str,"<td>","</td>");
echo $BonusProgram;
$str =explode("uk-table",$html)[3];
$str=explode("Token distribution:",$str)[1];
$Tokendistribution=getSonString($str,"<td>","</td>");
echo $Tokendistribution;
$str =explode("uk-table",$html)[4];
$str=explode("ICO Platform:",$str)[1];
$ICOPlatform=getSonString($str,"<td>","</td>");
echo $ICOPlatform;
$str =explode("uk-table",$html)[5];
$str=explode("Bug Detection:",$str)[1];
$BugDetection=getSonString($str,"<td>","</td>");
echo $BugDetection;
$str =explode("uk-table",$html)[5];
$str=explode("Bitcointalk Signature Campaign:",$str)[1];
$BitcointalkSignatureCampaign=getSonString($str,"<td>","</td>");
echo $BitcointalkSignatureCampaign;
$str =explode("uk-table",$html)[5];
$str=explode("Bounty:",$str)[1];
$Bounty=getSonString($str,"<td>","</td>");
echo $Bounty;
$str =explode("uk-table",$html)[5];
$str=explode("Translation:",$str)[1];
$Translation=getSonString($str,"<td>","</td>");
echo $Translation;
$str =explode("uk-table",$html)[5];
$str=explode("Social Media:",$str)[1];
$SocialMedia=getSonString($str,"<td>","</td>");
echo $SocialMedia;

?>