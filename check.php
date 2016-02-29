<?
ini_set('output_buffering','1');
session_start();
$code=$_SESSION['checkcode'];
?><html lang="zh-tw">
<head>
  <title>白樺論壇-事務管理-註冊</title>
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
?>
<?
 /*表單宣告*/

 function msg($msg){  

    $farr = array(  
        
		"/&/",
		"/\s+/", 
        "/</", 
        "/>/",
		"/\"/",
		"/'/",
   );
   $tarr = array(  
        
		"&amp;",
		"&nbsp;",
        "&lt;",
        "&gt;",
		"&quot;",
		"&#039;",
   );
  $msg = preg_replace( $farr,$tarr,$msg);  
   return $msg;  
}
 
function weil_ascii_html_en($str){
$v=strlen($str);
for ($i=0;$i<$v;$i++){
$x[]=ord($str[$i]);
}
$a=implode(';&#',$x);
$a='&#'.$a.';';
return $a;
}


function weil_ascii_html_de($str){
$a=substr($str,2);
$a=substr($a,0,-1);
$a=explode(';&#',$a);
$v=count($a);
for ($i=0;$i<$v;$i++){
$x[]=chr($a[$i]);
}
$b=implode('',$x);
return $b;
}

$myip=$_SERVER["REMOTE_ADDR"];
$time=date('YmdHis');
$nowyear=date('Y');
$username=msg($_POST['username']);
$name=$_POST['name'];
$pw=msg($_POST['pw']);
$pw2=msg($_POST['pw2']);
$email=msg($_POST['email']);
$sex=msg($_POST['sex']);
$year=msg($_POST['year']);
$moon=msg($_POST['moon']);
$day=msg($_POST['day']);
$question1=msg($_POST['question1']);
$question2=msg($_POST['question2']);
$answer1=msg($_POST['answer1']);
$answer2=msg($_POST['answer2']);
$safecode=msg($_POST['code']);

$birthday=$year.'.'.$moon.'.'.$day;
$password2=$question1.'----/*1456,1456*/----'.$answer1;
$password3=$question2.'----/*1456,1456*/----'.$answer2;

if ($username=="" or $name=="" or $pw=="" or $email=="" or $sex=="" or $year=="" or $moon=="" or $day=="" or $question1=="" or $question2=="" or $answer1=="" or $answer2=="" or $safecode==""){
echo "<script language=\"JavaScript\">
window.alert(\"未填欄位!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if (strlen($username)>20 or strlen($username)<6){
echo "<script language=\"JavaScript\">
window.alert(\"帳號長度異常!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if (strlen($name)>60 or strlen($name)<4){
echo "<script language=\"JavaScript\">
window.alert(\"暱稱長度異常!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if (strlen($pw)>30 or strlen($pw)<6){
echo "<script language=\"JavaScript\">
window.alert(\"密碼長度異常!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if (strlen($email)>50){
echo "<script language=\"JavaScript\">
window.alert(\"電郵長度異常!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if ($question1>7 or $question2>7 or $question1<0 or $question2<0){
echo "<script language=\"JavaScript\">
window.alert(\"驗證問題選項異常!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if (strlen($answer1)>20 or strlen($answer2)>20){
echo "<script language=\"JavaScript\">
window.alert(\"驗證問題答案異常!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if ($question1==$question2){
echo "<script language=\"JavaScript\">
window.alert(\"驗證問題選項異常!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if ($year>$nowyear){
echo "<script language=\"JavaScript\">
window.alert(\"年份選項異常!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if ($moon==2 and $day>29){
echo "<script language=\"JavaScript\">
window.alert(\"生日日期選項亂填!!\");
window.history.back(-1);
</script>";
exit;
}

if(eregi("^[a-zA-Z0-9_.]+$",$username)){
}else{
echo "<script language=\"JavaScript\">
window.alert(\"帳號只能是英數字!!\");
window.history.back(-1);
</script>";
exit;
}

if(eregi("^[a-zA-Z0-9_.]+$",$pw)){
}else{
echo "<script language=\"JavaScript\">
window.alert(\"密碼只能是英數字!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}


if (strpos($email,"@")){
$emailxx=explode('@',$email);
}else{
echo "<script language=\"JavaScript\">
window.alert(\"電子郵件格式錯誤！\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if ($_POST['code']!=$_SESSION['checkcode']){
echo "<script language=\"JavaScript\">
window.alert(\"驗證碼錯誤！\");
window.history.back(-1);
</script>";
exit;
}

if(eregi("^[a-zA-Z0-9_.]+$",$emailxx[0])){
}else{
echo "<script language=\"JavaScript\">
window.alert(\"電子郵件只能是英數字!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if(eregi("^[a-zA-Z0-9_.]+$",$emailxx[1])){
}else{
echo "<script language=\"JavaScript\">
window.alert(\"電子郵件只能是數字!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if(eregi("^[0-9]+$",$year)){
}else{
echo "<script language=\"JavaScript\">
window.alert(\"年分只能是數字!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if(eregi("^[0-9]+$",$moon)){
}else{
echo "<script language=\"JavaScript\">
window.alert(\"月份只能是數字!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if(eregi("^[0-9]+$",$day)){
}else{
echo "<script language=\"JavaScript\">
window.alert(\"日期只能是數字!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if (strlen($year)!=4 or strlen($moon)!=2 or strlen($day)!=2){
echo "<script language=\"JavaScript\">
window.alert(\"日期長度異常!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if ($year>$nowyear or $year<1930 or $moon>12 or $moon<1 or $day>31 or $day<1){
echo "<script language=\"JavaScript\">
window.alert(\"日期異常!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if ($sex!='1' and $sex!='0'){
echo "<script language=\"JavaScript\">
window.alert(\"性別異常!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

if ($pw!=$pw2){
echo "<script language=\"JavaScript\">
window.alert(\"兩次密碼不同!!\\nJS代碼出錯！表單注入，你的IP已被紀錄。\");
window.history.back(-1);
</script>";
exit;
}

$rand=rand(1111111,9999999);
$_SESSION["checkcode"]=$rand;

$name=weil_ascii_html_en($name);
$password2=weil_ascii_html_en($password2);
$password3=weil_ascii_html_en($password3);

//數據庫開始


require_once("config/config.php");

$query = "Select * From users Where userword=\"$username\"";

$result = mysql_query($query) or die("Query failed : " . mysql_error()); 

$line = mysql_fetch_assoc($result);

if($line!=""){

echo "<p><center><font color='red' size='+1'>帳號重複請重新註冊！<br><br><a href='./'>點擊此返回</a></font></center></p>";

exit;

}

$query = "Select * From users Where nickname=\"$name\"";

$result = mysql_query($query) or die("Query failed : " . mysql_error()); 

$line = mysql_fetch_assoc($result);

if($line!=""){

echo "<p><center><font color='red' size='+1'>暱稱重複請重新註冊！<br><br><a href='./'>點擊此返回</a></font></center></p>";

exit;

}

$query = "Select * From users Where email=\"$email\"";

$result = mysql_query($query) or die("Query failed : " . mysql_error()); 

$line = mysql_fetch_assoc($result);

if($line!=""){

echo "<p><center><font color='red' size='+1'>電子郵件重複請重新註冊！<br><br><a href='./'>點擊此返回</a></font></center></p>";

exit;

}


function weil62_en($str,$v) {

$a=$str;
$n=$v;
$k=strlen($a);

for ($i=0; $i<100; $i++){

ob_flush();
flush();

$b[$i]=gmp_strval(gmp_mod($a,$n));		//算餘數。
$a=gmp_strval(gmp_div_q($a,$n));		//算進位。

if ($a==0){
break;
}

}

$i=0;
for ($i=0; $i<$k; $i++){

$patterns[]="/0/";
$replacements[]="0";
$patterns[]="/1/";
$replacements[]="1";
$patterns[]="/2/";
$replacements[]="2";
$patterns[]="/3/";
$replacements[]="3";
$patterns[]="/4/";
$replacements[]="4";
$patterns[]="/5/";
$replacements[]="5";
$patterns[]="/6/";
$replacements[]="6";
$patterns[]="/7/";
$replacements[]="7";
$patterns[]="/8/";
$replacements[]="8";
$patterns[]="/9/";
$replacements[]="9";
$patterns[]="/10/";
$replacements[]="a";
$patterns[]="/11/";
$replacements[]="b";
$patterns[]="/12/";
$replacements[]="c";
$patterns[]="/13/";
$replacements[]="d";
$patterns[]="/14/";
$replacements[]="e";
$patterns[]="/15/";
$replacements[]="f";
$patterns[]="/16/";
$replacements[]="g";
$patterns[]="/17/";
$replacements[]="h";
$patterns[]="/18/";
$replacements[]="i";
$patterns[]="/19/";
$replacements[]="j";
$patterns[]="/20/";
$replacements[]="k";
$patterns[]="/21/";
$replacements[]="l";
$patterns[]="/22/";
$replacements[]="m";
$patterns[]="/23/";
$replacements[]="n";
$patterns[]="/24/";
$replacements[]="o";
$patterns[]="/25/";
$replacements[]="p";
$patterns[]="/26/";
$replacements[]="q";
$patterns[]="/27/";
$replacements[]="r";
$patterns[]="/28/";
$replacements[]="s";
$patterns[]="/29/";
$replacements[]="t";
$patterns[]="/30/";
$replacements[]="u";
$patterns[]="/31/";
$replacements[]="v";
$patterns[]="/32/";
$replacements[]="w";
$patterns[]="/33/";
$replacements[]="x";
$patterns[]="/34/";
$replacements[]="y";
$patterns[]="/35/";
$replacements[]="z";
$patterns[]="/36/";
$replacements[]="A";
$patterns[]="/37/";
$replacements[]="B";
$patterns[]="/38/";
$replacements[]="C";
$patterns[]="/39/";
$replacements[]="D";
$patterns[]="/40/";
$replacements[]="E";
$patterns[]="/41/";
$replacements[]="F";
$patterns[]="/42/";
$replacements[]="G";
$patterns[]="/43/";
$replacements[]="H";
$patterns[]="/44/";
$replacements[]="I";
$patterns[]="/45/";
$replacements[]="J";
$patterns[]="/46/";
$replacements[]="K";
$patterns[]="/47/";
$replacements[]="L";
$patterns[]="/48/";
$replacements[]="M";
$patterns[]="/49/";
$replacements[]="N";
$patterns[]="/50/";
$replacements[]="O";
$patterns[]="/51/";
$replacements[]="P";
$patterns[]="/52/";
$replacements[]="Q";
$patterns[]="/53/";
$replacements[]="R";
$patterns[]="/54/";
$replacements[]="S";
$patterns[]="/55/";
$replacements[]="T";
$patterns[]="/56/";
$replacements[]="U";
$patterns[]="/57/";
$replacements[]="V";
$patterns[]="/58/";
$replacements[]="W";
$patterns[]="/59/";
$replacements[]="X";
$patterns[]="/60/";
$replacements[]="Y";
$patterns[]="/61/";
$replacements[]="Z";
$patterns[]="/62/";
$replacements[]="Error!";

$b[$i]=preg_replace($patterns,$replacements,$b[$i]);

}

for ($i=0; $b[$i]!=""; $i++){

ob_flush();
flush();

$c=$b[$i].$c;

}

return $c;

}

function weilcode_en($str){
 
$myip=$_SERVER["REMOTE_ADDR"];
$time=date('YmdHis');
$ip=explode('.',$myip);

if (strlen($ip['0'])<3){
if (strlen($ip['0'])==2){
$ip['0']='6'.$ip['0'];
}
if (strlen($ip['0'])==1){
$ip['0']='66'.$ip['0'];
}
}


if (strlen($ip['1'])<3){
if (strlen($ip['1'])==2){
$ip['1']='6'.$ip['1'];
}
if (strlen($ip['1'])==1){
$ip['1']='66'.$ip['1'];
}
}


if (strlen($ip['2'])<3){
if (strlen($ip['2'])==2){
$ip['2']='6'.$ip['2'];
}
if (strlen($ip['2'])==1){
$ip['2']='66'.$ip['2'];
}
}


if (strlen($ip['3'])<3){
if (strlen($ip['3'])==2){
$ip['3']='6'.$ip['3'];
}
if (strlen($ip['3'])==1){
$ip['3']='66'.$ip['3'];
}
}

$xip=$ip['0'].$ip['1'].$ip['2'].$ip['3'];

$x=$time.$xip;

$x=weil62_en($x,'62');

$a=strlen($str);

for ($i=0; $i<$a; $i++){

ob_flush();
flush();

$b[$i]=ord($str[$i]);

}

for ($i=0; $i<$a; $i++){

ob_flush();
flush();

$b[$i]=255-$b[$i];

if (strlen($b[$i])<3){
if (strlen($b[$i])==2){
$b[$i]='6'.$b[$i];
}
if (strlen($b[$i])==1){
$b[$i]='60'.$b[$i];
}
}

if ($i==0){
$c=$b[$i];
}else{
$c=$c.$b[$i];
}

}


if ($c==''){

}else{
$c=weil62_en($c,'62');
}

$x=$x.'`'.$c;

return $x;

}

$pw=weilcode_en($pw);

$x=weilcode_en($username);

$nowtime=time();

$query = "INSERT INTO users (userword,nickname,password,password2,password3,password4,email,regtime,regtime2,ip,sex,emailver,birthday,usergroup) VALUES('$username','$name','$pw','$password2','$password3','$x','$email','$time','$nowtime','$myip','$sex','0','$birthday','0')";

$result = mysql_query($query) or die("Query failed : " . mysql_error()); 

$query = "Select uid From users Where ip=\"$myip\" and userword=\"$username\"";

$result = mysql_query($query) or die("Query failed : " . mysql_error()); 

$line = mysql_fetch_assoc($result);

$uid=$line['uid'];

mysql_close($con);


//數據庫結束




echo "<p><center><font color='red' size='+1'>註冊成功！</font></center></p><br>";

$body="\r\n
\r\n感謝您的註冊，本論壇SexDarkCat感謝您。
\r\n以下是電子郵件驗證連結：
\r\n
\r\n http://sexdarkcat.twbbs.org/sqltest/emailver.php?mod=1&uid=$uid&code=$x
\r\n
\r\n如果無法連結或點擊請手動複製驗證連結貼入瀏覽器網址列。
\r\n如果您從未註冊過任何論壇，請您忽略此信。
\r\n請勿回覆！此由系統自動寄出，回信將不會有任何回應。";

$xmail=@mail("$email", "SexDarkCat註冊系統",$body,"From:SexDarkCatSystem<admin@twgogo.net.tf>");
if ($xmail){
echo "<p><center><font color='blue'>請查收電子郵件，系統已發送一封郵件到您的信箱。<br>請在30分鐘內驗證，否則帳號將刪除！<br></font><font color='red' size='-1' >$email</font><br></center></p>";
}else{
echo "<p><center><font color='blue'>電子郵件驗證系統發送失敗，請洽管理員！<br><font color='red' size='-1' >qwer14561456@gmail.com</font><br></center></p>";
}

echo "<center><BR><BR><BR><BR>WhiteBirch Forum &#169;Copyright <br>2010-2012 W.B.F. All Rights Reserved. 版權所有 權利專屬</center>"; 
 
 ?>
 
</body>
</html>