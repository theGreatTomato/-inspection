<?php
	$position = $_POST['position'];
	$user = $_POST['user'];
	$pw = $_POST['password'];
	if($position == '管理员'){
		if($user == '321' && $pw == '321'){
			setcookie ('user', $user,time()+3600, '/');
			setcookie ('position', '',time()-3600, '/');
			setcookie ('position', 'administrator',time()+3600, '/');
			$arr = array(0 => 'ture');
			echo json_encode($arr);
		}
		else{
			//setcookie ('position', '',time()-3600, '/');
			$arr = array(0 => 'false');
			echo json_encode($arr);	
		}
	}
	else{
		if($user == '123' && $pw == '123'){
			setcookie ('position', '',time()-3600, '/');
			setcookie ('position', 'inspector',time()+3600, '/');
			setcookie ('user', $_POST['user'],time()+3600, '/');
			$arr = array(0 => 'ture');
			echo json_encode($arr);
		}
		else{
			$arr = array(0 => 'false');
			echo json_encode($arr);	
		}
	}

?>