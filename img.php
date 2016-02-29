<?php 
header('Content-type: text/html; charset=big5');
header("Content-type: image/* ");
for($i=0;$i<5;$i++) 
{ 
 $code=dechex(rand(1,15)).$code; 
}

$im=imagecreatetruecolor(80,30);//創建一個真彩色圖片,寬80px,高30px 

//創建顏色
$d=rand(200,255);
$e=rand(200,255);
$f=rand(200,255);
$bg=imagecolorallocate($im,0,0,0);//第一次用調試板時為背景顏色,000為黑色 
$te=imagecolorallocate($im,$e,$f,$g);//255,255,255為白色 

//畫線條(干擾線) 
for($i=0;$i<10;$i++) 
{  
 $te2=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));//255,255,255為白色 
 imageline($im,0,rand(0,20),100,rand(0,30),$te2); 
} 

//畫點(噪點) 
for($i=0;$i<200;$i++) 
{  
 imagesetpixel($im,rand(0,100),rand(0,30),$te2); 
} 

imagettftext($im,12,5,20,20,$te,'GOTHICB.TTF',$code); 
session_start();
$_SESSION['checkcode']=$code; 
//輸出圖片 
header('Content-type:image/jpeg'); 
imagejpeg($im);
?>
