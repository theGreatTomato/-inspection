<?php
//header( "Content-type: image/png");
$PSize = filesize('1.png');
//$picturedata = fread(fopen('1.png', "r"), $PSize);
//echo $picturedata;
echo $PSize;
echo 'ok';
$image   = "1.png"; //图片地址
$fp   = fopen($image, 'r');
$content = fread($fp, filesize($image));
 $base64   = base64_encode($contents);  
 echo $base64;
fclose($fp);

$file = fopen("2.png","w");//打开文件准备写入  
$fw = fwrite($file,$content);//写入  
fclose($file);//关闭 
echo $fw;
?>