<html lang="zh-tw">
<head>
  <title>白樺論壇-事務管理-顯示資料</title>
  <meta content="WeilJimmer" name="author">
  <link rel="shortcut icon" href="favicon.ico">
<meta content="text/html;charset=UTF-8" http-equiv="Content-Type">
<meta id="_moz_html_fragment">
	<style type="text/css">
.style2 {
	border-collapse: collapse;
	border: 2px solid #FFFF00;
	align: center;
	text-align: center;
}
a {
	color: #FF00FF;
}
a:visited {
	color: #FF00FF;
}
</style>
</head>
<body style="color: #FFFFFF; background-color: #000000; background-attachment: fixed">
<table align="center" style="width: 1000px; float: center;" align="center" border="1" cellpadding="2" cellspacing="2" class="style2">
<?php  
/*設定時間變數為台灣+8*/
ini_set('date.timezone','Asia/Taipei');  
/*End*/


if(!isset($_GET["page"])){
$page=1;
}else{
$page = intval($_GET["page"]);
}



//數據庫開始


require_once("config/config.php");

$query = "Select uid,nickname,ip,email,birthday,emailver from users";
$query2 = "Select count(*) from users";

$total = mysql_fetch_row(mysql_query($query2)); 

$per = 10; 
$totalpage = ceil($total["0"]/$per); //總頁數
$startrow = ($page-1)*$per; //每頁起始資料序號
$endrow = $startrow+$per;

$result = mysql_query($query) or die("Query failed : " . mysql_error()); 
$i=1;
while ($line = mysql_fetch_assoc($result)) {

if ($i>=$startrow and $i<=$endrow){
print("<tr>\n<td>".$line["uid"]."</td>\n<td>".$line["nickname"]."</td>\n<td>".$line["ip"]."</td>\n<td>".$line["email"]."</td>\n<td>".$line["birthday"]."</td>\n<td>".$line["emailver"]."</td>\n</tr>\n");
}

$i++;

}

echo  '</table>';

mysql_close($con);

//數據庫結束

echo '<br><center><font color="red"><b><u>';
for($k=1; $k<=$totalpage; $k++){
if ($k!=$page){
echo '<a href="'.'print.php'."?page=".$k.'">'.$k.'</a>'; 
}else{
echo $k; 
}
}
echo '</u></b></font></center>';

echo "<p><center><font color='red' size='+1'>查詢資料成功！</font></center></p>";

 ?>
</body>
</html>