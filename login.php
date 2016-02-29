<html lang="zh-tw">
<head>
  <title>白樺論壇-登入</title>
  <meta content="WeilJimmer" name="author">
  <link rel="shortcut icon" href="favicon.ico"/>
<meta content="text/html;charset=UTF-8" http-equiv="Content-Type">
<meta id="_moz_html_fragment">
	<style type="text/css">
.style1 {
	font-size: medium;
}
</style>
</head>
<body style="color: rgb(0, 0, 0); background-color: rgb(153, 255, 255);" alink="#000099" link="#000099" vlink="#990099">
<?php  
/*設定時間變數為台灣+8*/
ini_set('date.timezone','Asia/Taipei');  
/*End*/

$mod=$_GET['mod'];
if($mod==1){


//數據庫開始

$uw=$_POST['uw'];
$pw=$_POST['pw'];

require_once("config/config.php");

$query = "Select uid,nickname,emailver,password,userword From users Where userword=\"$uw\"";

$result = mysql_query($query) or die("Query failed : " . mysql_error()); 

$line = mysql_fetch_assoc($result);

function weil62_de($str,$n) {

$b=$str;
$g=-1;
$k=strlen($b);
$n=$n;

for ($i=0; $i<100; $i++){

ob_flush();
flush();

$patterns[]="0";
$replacements[]="/0/";
$patterns[]="1";
$replacements[]="/1/";
$patterns[]="2";
$replacements[]="/2/";
$patterns[]="3";
$replacements[]="/3/";
$patterns[]="4";
$replacements[]="/4/";
$patterns[]="5";
$replacements[]="/5/";
$patterns[]="6";
$replacements[]="/6/";
$patterns[]="7";
$replacements[]="/7/";
$patterns[]="8";
$replacements[]="/8/";
$patterns[]="9";
$replacements[]="/9/";
$patterns[]="10";
$replacements[]="/a/";
$patterns[]="11";
$replacements[]="/b/";
$patterns[]="12";
$replacements[]="/c/";
$patterns[]="13";
$replacements[]="/d/";
$patterns[]="14";
$replacements[]="/e/";
$patterns[]="15";
$replacements[]="/f/";
$patterns[]="16";
$replacements[]="/g/";
$patterns[]="17";
$replacements[]="/h/";
$patterns[]="18";
$replacements[]="/i/";
$patterns[]="19";
$replacements[]="/j/";
$patterns[]="20";
$replacements[]="/k/";
$patterns[]="21";
$replacements[]="/l/";
$patterns[]="22";
$replacements[]="/m/";
$patterns[]="23";
$replacements[]="/n/";
$patterns[]="24";
$replacements[]="/o/";
$patterns[]="25";
$replacements[]="/p/";
$patterns[]="26";
$replacements[]="/q/";
$patterns[]="27";
$replacements[]="/r/";
$patterns[]="28";
$replacements[]="/s/";
$patterns[]="29";
$replacements[]="/t/";
$patterns[]="30";
$replacements[]="/u/";
$patterns[]="31";
$replacements[]="/v/";
$patterns[]="32";
$replacements[]="/w/";
$patterns[]="33";
$replacements[]="/x/";
$patterns[]="34";
$replacements[]="/y/";
$patterns[]="35";
$replacements[]="/z/";
$patterns[]="36";
$replacements[]="/A/";
$patterns[]="37";
$replacements[]="/B/";
$patterns[]="38";
$replacements[]="/C/";
$patterns[]="39";
$replacements[]="/D/";
$patterns[]="40";
$replacements[]="/E/";
$patterns[]="41";
$replacements[]="/F/";
$patterns[]="42";
$replacements[]="/G/";
$patterns[]="43";
$replacements[]="/H/";
$patterns[]="44";
$replacements[]="/I/";
$patterns[]="45";
$replacements[]="/J/";
$patterns[]="46";
$replacements[]="/K/";
$patterns[]="47";
$replacements[]="/L/";
$patterns[]="48";
$replacements[]="/M/";
$patterns[]="49";
$replacements[]="/N/";
$patterns[]="50";
$replacements[]="/O/";
$patterns[]="51";
$replacements[]="/P/";
$patterns[]="52";
$replacements[]="/Q/";
$patterns[]="53";
$replacements[]="/R/";
$patterns[]="54";
$replacements[]="/S/";
$patterns[]="55";
$replacements[]="/T/";
$patterns[]="56";
$replacements[]="/U/";
$patterns[]="57";
$replacements[]="/V/";
$patterns[]="58";
$replacements[]="/W/";
$patterns[]="59";
$replacements[]="/X/";
$patterns[]="60";
$replacements[]="/Y/";
$patterns[]="61";
$replacements[]="/Z/";

$m[$i]=preg_replace($replacements,$patterns,$b[$i]);

if ($m[$i]>=$n){
$x='E';
return $x;
}

}

$v=$k-1;

for ($i=0; $i<$k; $i++){

ob_flush();
flush();

$o[$i]=gmp_strval(gmp_pow("$n","$v"));
$c[$i]=gmp_strval(gmp_mul($m[$i],$o[$i]));
$v--;
}

$t=0;

for ($i=0; $i<100; $i++){

ob_flush();
flush();

$ci=$c[$i];
if ($ci==""){
$ci=0;
}else{
}

$t=gmp_strval(gmp_add($ci,$t));

}

return $t;

}


function weilcode_de($str){
$myip=$_SERVER["REMOTE_ADDR"];
$time=date('YmdHis');
$pw=explode('`',$str);
$hid=array('=','!','-','_','*','+','@','/','^');
$pw[1]=str_ireplace($hid,'',$pw[1]);
$pw1=$pw[0];
$pw2=$pw[1];
$pw1=weil62_de($pw1,'62');
$pw2=weil62_de($pw2,'62');
$date=substr($pw1,0,14);
$ip=substr($pw1,-12);
$ip=chunk_split($ip,'3','.');
$ip=substr($ip,0,-1);
$ip=explode('.',$ip);
for($i=0;$i<4;$i++){
if (strlen($ip[$i])==3){
$pp1=substr($ip[$i],0,2);
if ($pp1==66){
$ip[$i]=substr($ip[$i],2);
}else{
$pp1=substr($ip[$i],0,1);
if ($pp1==6){
$ip[$i]=substr($ip[$i],1);
}
}
}
}
$ip=implode('.',$ip);
$pw2=chunk_split($pw2,'3',',');
$pw2=substr($pw2,0,-1);
$pw2=explode(',',$pw2);
$pw2count=count($pw2);
for($i=0;isset($pw2[$i]);$i++){
$z=$pw2[$i];
if (strlen($pw2[$i])==3){
$pp1=substr($pw2[$i],0,2);
if ($pp1==60){
$z=substr($pw2[$i],2);
}else{
$pp1=substr($pw2[$i],0,1);
if ($pp1==6){
$z=substr($pw2[$i],1);
}
}
}
$p=255-$z;
$pwx[]=chr($p);
}
$pwx=implode($pwx);
$x['date']=$date;
$x['ip']=$ip;
$x['pw']=$pwx;
$x['0']=$date;
$x['1']=$ip;
$x['2']=$pwx;

return $x;
}

if($line!=""){

$password=weilcode_de($line['password']);
$password=$password['pw'];
$nickname=$line['nickname'];
if($line['userword'] == $uw and $password == $pw){

if ($line['emailver']!='1'){
$ev='您的電子郵件還未驗證成功！';
}else{
$ev='';
}
echo "<br><br><center>登入成功！Successful！<br>歡迎 $nickname 。<br>$ev</center>";

}else{

echo "<br><br><center>登入失敗！Fail！</center>";

}


}else{
echo "<br><br><center>登入失敗！Fail！</center>";
}

mysql_close($con);


echo "<center><BR><BR><BR><BR>WhiteBirch Forum &#169;Copyright <br>2010-2012 W.B.F. All Rights Reserved. 版權所有 權利專屬</center>"; 


}else{

echo "<br><br><center><h3><font color='red'><b>登入</b></font></h3></center>
<center><form method=\"post\" action=\"login.php?mod=1\">
帳號：<input type=\"text\" id=\"uw\" name=\"uw\" maxlength=\"20\" style=\"width: 500px\"><br>
密碼：<input type='password' id='pw' name='pw' maxlength='30' style='width: 500px'><br>
<input type=\"submit\" value=\"登入\"></form></center>";
echo "<center><BR><BR><BR><BR><BR><BR><BR>WhiteBirch Forum &#169;Copyright <br>2010-2012 W.B.F. All Rights Reserved. 版權所有 權利專屬</center>"; 

}


//數據庫結束

 ?>
 
</body>
</html>