<?php 
header('Content-type: text/html; charset=big5');
header("Content-type: image/* ");
for($i=0;$i<5;$i++) 
{ 
 $code=dechex(rand(1,15)).$code; 
}

$im=imagecreatetruecolor(80,30);//�Ыؤ@�ӯu�m��Ϥ�,�e80px,��30px 

//�Ы��C��
$d=rand(200,255);
$e=rand(200,255);
$f=rand(200,255);
$bg=imagecolorallocate($im,0,0,0);//�Ĥ@���νոժO�ɬ��I���C��,000���¦� 
$te=imagecolorallocate($im,$e,$f,$g);//255,255,255���զ� 

//�e�u��(�z�Z�u) 
for($i=0;$i<10;$i++) 
{  
 $te2=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));//255,255,255���զ� 
 imageline($im,0,rand(0,20),100,rand(0,30),$te2); 
} 

//�e�I(���I) 
for($i=0;$i<200;$i++) 
{  
 imagesetpixel($im,rand(0,100),rand(0,30),$te2); 
} 

imagettftext($im,12,5,20,20,$te,'GOTHICB.TTF',$code); 
session_start();
$_SESSION['checkcode']=$code; 
//��X�Ϥ� 
header('Content-type:image/jpeg'); 
imagejpeg($im);
?>
