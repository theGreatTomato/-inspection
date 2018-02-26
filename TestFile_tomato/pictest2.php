
<?php
    $pic = '1.png';
    $content=file_get_contents($pic); 
    $content="0x".bin2hex($content); //转化成16进制 0x为检验之类的用途
     //图片转16进制
    

     //把16进制打印出来
    if($content){
          echo $content;
          echo '<br />';
          $file = fopen("pic2.txt","w");
         echo fwrite($file,$content);
         fclose($file);
      }
      else{
          echo 'false';
      }
?>