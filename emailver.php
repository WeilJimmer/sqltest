<html lang="zh-tw">
<head>
  <title>白樺論壇-事務管理-電子郵件驗證</title>
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
$uid=$_GET['uid'];
$code=$_GET['code'];
$nowtime=date('YmdHis');
$nowtime2=time();

if($mod==1){


//數據庫開始


require_once("config/config.php");

$query = "Select uid,email,userword,nickname,regtime2 From users Where password4=\"$code\" and uid=\"$uid\" and emailver=\"0\"";

$result = mysql_query($query) or die("Query failed : " . mysql_error()); 

$line = mysql_fetch_assoc($result);

if($line!=""){

$regtime=$line['regtime2'];
$email=$line['email'];
$nickname=$line['nickname'];
$userword=$line['userword'];
$uid=$line['uid'];

$regtime=$regtime+1800;

if ($nowtime2>$regtime){
$query = "DELETE FROM users WHERE uid='$uid'";
$result = mysql_query($query) or die("Query failed : " . mysql_error()); 
echo "<br><br><br><p><center><font color='red' size='+1'>驗證失敗！因為已經超過30分鐘。</font><br><br></center></p>";
echo "<center><BR><BR><BR><BR>WhiteBirch Forum &#169;Copyright <br>2010-2012 W.B.F. All Rights Reserved. 版權所有 權利專屬</center>"; 
echo '</body></html>';
exit;
}

}else{
echo 'ERROR CODE:404!';
echo '</body></html>';
exit;
}

$query = "UPDATE users SET emailver='1' WHERE uid='$uid'";
$result = mysql_query($query) or die("Query failed : " . mysql_error()); 
echo "<br><br><br><p><center><font color='blue' size='+1'>驗證成功！</font><br><br>$email 通過，帳號已開通。<br><br>".'<table style="text-align: left; width: 493px; height: 85px;" border="1" cellpadding="2" cellspacing="2">'."<tr><td>用戶：</td><td>$uid</td></tr><tr><td>帳號：</td><td>$userword</td></tr><tr><td>暱稱：</td><td>$nickname</td></tr><tr><td>電郵：</td><td>$email</td></tr></table><br><br><a href='login.php'>點擊此登入</a></center></p>";
echo "<center><BR><BR><BR><BR>WhiteBirch Forum &#169;Copyright <br>2010-2012 W.B.F. All Rights Reserved. 版權所有 權利專屬</center>"; 

mysql_close($con);


}else{

echo "ERROR CODE:500!";
echo '</body></html>';
exit;
}


//數據庫結束

 ?>
 
</body>
</html>