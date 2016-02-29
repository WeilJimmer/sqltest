<html lang="zh-tw">
<head>
  <title>白樺論壇-安裝</title>
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
//數據庫開始


require_once("config/config.php");

//創建表的請求

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
// Create table in my_db database
mysql_select_db("sqltest", $con);
$sql = "CREATE TABLE users 
(
uid int AUTO_INCREMENT,
userword text,
nickname text,
password text,
password2 text,
password3 text,
password4 text,
email varchar(50),
regtime varchar(50),
regtime2 varchar(50),
ip varchar(20),
sex varchar(5),
emailver text,
birthday text,
usergroup text,
PRIMARY KEY (uid)
)";
$result = mysql_query($sql) or die("Query failed : " . mysql_error()); 


mysql_close($con);


//數據庫結束


echo "<p><center><font color='red' size='+1'>表單創建成功。</font><br><br><a href='./'><font color='red'>點擊此返回上一頁</font></a></center></p>";
echo "<p><center><font color='red' size='+1'>登入訊息已發送成功！本SQL測試程式到此結束。</font><br><br><a href='./print.php'><font color='red'>點擊此查看資料</font></a><br><br><a href='./'><font color='red'>點擊此測試註冊</font></a><br><br><a href='./login.php'><font color='red'>點擊此測試登入</font></a></center></p>";

exit;/*結束讀取以下指令*/


/*寄電子郵件指令開始*/

//(mail("qwer14561456@gmail.com", "Re.14561456.co.cc", "\r\n 寄件人 : $myname \r\n 寄件人電子郵件 : $myemail \r\n 寄件人訊息 : \r\n $mymsg", $headers));
//echo "<BR><BR><BR><BR><BR><BR><center><B>郵寄已成功寄出，請等待管理員的回信。<BR>感謝您的回覆。請在1~3天的時間內查收電郵。</B><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>WhiteBirch Forum &#169;Copyright <br>2010-2012 W.B.F. All Rights Reserved. 版權所有 權利專屬</center>"; 

/*寄電子郵件指令結束*/ 
 
 ?>
 
</body>
</html>