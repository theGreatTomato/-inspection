
<?php
    $pic = '1.png';
    $content=file_get_contents($pic); 
    $content="0x".bin2hex($content); //转化成16进制 0x为检验之类的用途
     //图片转16进制
?>