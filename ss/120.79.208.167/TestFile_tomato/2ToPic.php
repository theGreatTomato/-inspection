
<?php
    $content = file_get_contents("php://input");
    $len = strlen($content);
    $newstr = substr($content,5,$len-1);
    echo $newstr;

    $content = pack("H*",$newstr);

    echo $content;
    if($content){
         $file = fopen("2topic.png","w");
         echo fwrite($file,$content);
         fclose($file);
    } 
?>