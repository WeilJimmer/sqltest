<?

/*設定時間變數為台灣+8*/
ini_set('date.timezone','Asia/Taipei');  
/*End*/

$year=date('Y');

?>
<!DOCTYPE html>
<html lang="zh-tw">
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
<script>
function checkForm(obj){
if(obj.username.value==obj.pw.value){
alert('帳號和密碼不可重複！');
obj.username.focus();
return false;
}
if(obj.username.value==""){
alert('帳號不可為空！');
obj.username.focus();
return false;
}
if(obj.username.value.length<6){
alert('帳號長度小於6。');
obj.username.focus();
return false;
}
if(obj.name.value==obj.pw.value){
alert('暱稱和密碼不可重複！');
obj.name.focus();
return false;
}
if(obj.name.value==""){
alert('暱稱不可為空！');
obj.name.focus();
return false;
}
if(obj.pw.value.length<6){
alert('密碼長度小於6。');
obj.pw.focus();
return false;
}
if(obj.pw.value==""){
alert('密碼不可為空！');
obj.pw.focus();
return false;
}
if(obj.pw.value!=obj.pw2.value){
alert('兩次輸入密碼不相同！');
obj.pw.focus();
return false;
}
if(obj.name.value.length<4){
alert('暱稱長度小於4。');
obj.name.focus();
return false;
}
if(obj.email.value==""){
alert('電子郵件不可為空！');
obj.email.focus();
return false;
}
if(obj.code.value==""){
alert('驗證碼不可為空！');
obj.code.focus();
return false;
}
if(obj.email.value!=""){
var regExp = /^[^@^\s]+@[^\.@^\s]+(\.[^\.@^\s]+)+$/;
	if ( obj.email.value.match(regExp) ){
	}else{
	alert('電子郵件格式錯誤！');
	obj.email.focus();
	return false;
	}
}
if(obj.question1.value==obj.question2.value){
alert('機密問題重複！');
obj.question2.focus();
return false;
}
if(obj.answer1.value==""){
alert('機密問題1不可為空！');
obj.answer1.focus();
return false;
}
if(obj.answer2.value==""){
alert('機密問題2不可為空！');
obj.answer2.focus();
return false;
}
if(obj.answer1.value==obj.answer2.value){
alert('機密問題答案重複！');
obj.answer2.focus();
return false;
}

return true;
}
</script>
</head>
<body style="color: rgb(0, 0, 0); background-color: rgb(153, 255, 255);" alink="#000099" link="#000099" vlink="#990099">
<br><br>
<h3><font color="red"><b>所有欄位為必填，一個中文字等於3個字元</b></font></h3>
<form id="form1" method="post" action="check.php" onSubmit="ok=checkForm(this);if(ok){}else{return false;}">
<span class="style1">帳號：(最多20字，最少6字)</span><br>
<input type="text" id="username" name="username" maxlength="20" style="width: 500px"><br>
<br>
<span class="style1">暱稱：(最多20字，最少4字)</span><br>
<input type="text" id="name" name="name" maxlength="20" style="width: 500px"><br>
<br>
<span class="style1">密碼：(最多30字，最少6字)</span><br>
<input type="password" id="pw"  name="pw" maxlength="30" style="width: 500px"><br>
<br>
<span class="style1">重複密碼：(最多30字，最少6字)</span><br>
<input type="password" id="pw2"  name="pw2" maxlength="30" style="width: 500px"><br>
<br>
<span class='style1'>信箱：(最多50字)</span><br>
<input type='text' id='email' name='email' maxlength='50' style='width: 500px'><br>
<br>
<span class="style1">性別：</span><br>
<input name="sex" id="sex" type="radio" value="1" checked="checked">男&nbsp;&nbsp;&nbsp;<input name="sex" id="sex" type="radio" value="0">女<br>
<br>
<span class="style1">生日：</span><br>
<select name="year">
<?
for ($i=1930; $i<=$year; $i++){
echo '<option value="'.$i.'">'.$i.'</option>';
}
?>
</select>年<select name="moon">
<?
for ($i=1; $i<=12; $i++){
if (strlen($i)==1){
$i='0'.$i;
}
echo '<option value="'.$i.'">'.$i.'</option>';
}
?>
</select>月<select name="day">
<?
for ($i=1; $i<=31; $i++){
if (strlen($i)==1){
$i='0'.$i;
}
echo '<option value="'.$i.'">'.$i.'</option>';
}
?>
</select>日<br>
<br>
<span class="style1">機密問題回答1：<select id="question1" name="question1">
<option value="0">媽媽的名子?</option>
<option value="1">小學學校名稱?</option>
<option value="2">我的生日?</option>
<option value="3">最尊敬的老師?</option>
<option value="4">我的喜歡的國家?</option>
<option value="5">我愛吃的食物?</option>
<option value="6">最喜愛的東西?</option>
<option value="7">最討厭的東西?</option>
</select></span><br>
<input type="text" id="answer1" name="answer1" maxlength="20" style="width: 500px"><br>
<br>
<span class="style1">機密問題回答2：<select id="question2" name="question2">
<option value="0">媽媽的名子?</option>
<option value="1">小學學校名稱?</option>
<option value="2">我的生日?</option>
<option value="3">最尊敬的老師?</option>
<option value="4">我的喜歡的國家?</option>
<option value="5">我愛吃的食物?</option>
<option value="6">最喜愛的東西?</option>
<option value="7">最討厭的東西?</option>
</select></span><br>
<input type="text" id="answer2" name="answer2" maxlength="20" style="width: 500px"><br>
<br>
<span class='style1'>驗證碼：<img id="img" src="img.php"><input name="button" type="button" value="刷新" onclick="img.src='img.php'"></span><br>
<input type='text' id='code' name='code' maxlength='15' style='width: 500px'><br>
<br>
&nbsp;<input type="submit" value="註冊" style="width: 200px; height: 25px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" name="Reset" value="重填" style="width: 200px; height: 25px">
</form>

</body>
</html>