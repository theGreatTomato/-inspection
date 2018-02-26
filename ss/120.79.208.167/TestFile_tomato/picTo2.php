
<?php
    $pic = '1.jpg';
    $content=file_get_contents($pic); //二进制图片流
    $content=bin2hex($content); //转化成16进制 0x为检验之类的用途
     //图片转16进制
    echo $content.'<br />';
 
    /*  $content = pack("H*",$content);
    转变回来的方法 


    echo $content;
    if($content){
         $file = fopen("new.jpg","w");
         echo fwrite($file,$content);
         fclose($file);
    }  */
?>