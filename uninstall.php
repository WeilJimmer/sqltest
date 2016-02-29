<html lang="zh-tw">
<head>
  <title>白樺論壇-卸載</title>
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

//刪除表的請求

$query = "Delete From users;";

$result = mysql_query($query) or die("Query failed : " . mysql_error()); 

mysql_close($con);


//數據庫結束




echo "<p><center><font color='red' size='+1'>表單刪除成功。</font><br><br><a href='./'><font color='red'>點擊此返回上一頁</font></a></center></p>";

 ?>
 
</body>
</html>