<?php
if($_POST['num'] == "0"){
	setcookie ('position', '',time()-3600, '/');
	$arr = array(0 => 'false');
	echo json_encode($arr);	
}
else{
	if(!isset($_COOKIE['position']) || $_COOKIE['position'] != 'inspector'){
		$arr = array(0 => 'false');
		echo json_encode($arr);	
	}	
	else{
		/***从数据库提取数据**/
		include 'mysql_connect.php';
		$arr = array(0 => 'ture');
		echo json_encode($arr);	
	}
}
?>