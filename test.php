<html lang="zh-tw">
<head>
  <title>白樺論壇-事務管理-顯示資料</title>
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
<?
/*設定時間變數為台灣+8*/
ini_set('date.timezone','Asia/Taipei');  
/*End*/
echo time();


//數據庫開始

/*
$con = mysqli_connect("127.0.0.1", "root", "rmpwj0612581258") or die("Could not connect : " . mysql_error()); 

//$select = mysql_select_db("test") or die("Could not select database.");

$query = "SHOW DATABASES;";

$result = mysql_query($query) or die("Query failed : " . mysql_error()); 

print_r (mysql_fetch_assoc($result));

mysql_close($con);
*/

//數據庫結束



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


$regtime='20130310104103';
$timea=substr($regtime,8);
$timea=substr($timea,0,-2);
$timea=$timea+30;
if(substr($timea,-2)>=60){$timea=$timea-60;$timea=$timea+100;}
$today=substr($regtime,0,8);



 ?>
 
</body>
</html>