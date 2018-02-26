<?php
$content = file_get_contents("php://input") ;
     //把16进制打印出来
    if($content){
          $url = "../wurenji/images/pic2.jpg";
          $file = fopen($url,"w");
          fwrite($file,$content);
          fclose($file);
          echo 'ok';
      }
      else{
          echo 'false';
      }
?>