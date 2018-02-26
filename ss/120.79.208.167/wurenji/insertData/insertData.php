<?php 
	include '../mysql_connect.php';	
	$date= date("Y-m-d",strtotime($_POST['date'])); 
	$link = mysql_real_escape_string($_POST['link']);//几号线
	$up_down = mysql_real_escape_string($_POST['up_down']);//上下行
	$addr = mysql_real_escape_string($_POST['addr']);
	$variety = mysql_real_escape_string($_POST['variety']);//故障种类
	$grade = mysql_real_escape_string($_POST['grade']);//故障等级
	$inspector = mysql_real_escape_string($_POST['inspector']);
	$image = null;

	//字符串转变成数字等；
	$link = intval($link);
	if($grade == '一级故障'){
		$grade = 1;
	}
	else if($grade == '二级故障'){
		$grade = 2;
	}
	else{
		$grade = 3;
	}

	//图片上传处理
	function random($filename) 
	{ 
	    $arr = explode('.', $filename);
	    $filename = array_pop($arr);
	    $a = rand(100,10000);
	    $filename = $a.".".$filename;
	    return $filename;
	}
	if($_FILES["fileimage"]["name"]){
      	$_FILES["fileimage"]["name"]=random($_FILES['fileimage']['name']);
        while (file_exists("upload/" . $_FILES["fileimage"]["name"]))
            {
            	$a = rand(1,10);
          		$_FILES["fileimage"]["name"] = (string)$a.$_FILES["fileimage"]["name"];
          	}
          		move_uploaded_file($_FILES["fileimage"]["tmp_name"],
          		"upload/" . $_FILES["fileimage"]["name"]);
           		$image = $_FILES["fileimage"]["name"];
    }
	$insert = "INSERT INTO guzhang(date,up_down,addr,variety,grade,image,inspector,link)VALUES('$date','$up_down','$addr','$variety',$link,'$image','$inspector',$grade)";
	$a = mysql_query($insert);
?>