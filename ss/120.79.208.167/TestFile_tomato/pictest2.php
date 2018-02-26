
<?php
  /*  header( "Content-type: image/png");
    $pic = '1.png';*/
   // $content=file_get_contents($pic); 
  //  $content=bin2hex($content); //转化成16进制
    /*  if($content){
          echo $content;
          echo '<br />';
          $file = fopen("pic2.txt","w");
         echo fwrite($file,$content);
         fclose($file);
      }
      else{
          echo 'false';
      }*/

    /*$myfile = fopen($pic, "r") or die("Unable to open file!");
    echo fread($myfile,filesize($pic));
    fclose($myfile);*/

 //header( "Content-type: image/png");
      $pic = '2.png';
    $content=file_get_contents($pic);
    echo $content;
    if($content){
         $file = fopen("new.png","w");
         echo fwrite($file,$content);
         fclose($file);
    }  
?>